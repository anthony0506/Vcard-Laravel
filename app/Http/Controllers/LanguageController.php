<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Models\Language;
use App\Models\User;
use App\Repositories\LanguageRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class LanguageController extends AppBaseController
{
    /** @var LanguageRepository */
    private $languageRepository;

    public function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepository = $languageRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('sadmin.languages.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateLanguageRequest  $request
     * @return JsonResponse
     */
    public function store(CreateLanguageRequest $request): JsonResponse
    {
        $input = $request->all();

        $allLanguagesArr = [];
        $languages = File::directories(base_path('lang'));
        foreach ($languages as $language) {
            $allLanguagesArr[] = substr($language, -2);
        }

        if (in_array($input['iso_code'], $allLanguagesArr)) {
            throw new UnprocessableEntityHttpException($input['iso_code'].' '.__('messages.placeholder.lang_already_exists'));
        }

        $language = $this->languageRepository->create($input);
        $translation = $this->languageRepository->translationFileCreate($language);
        Artisan::call('lang:js');

        return $this->sendResponse($language, __('messages.placeholder.language_save'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Language  $language
     * @return JsonResponse
     */
    public function edit(Language $language)
    {
        return $this->sendResponse($language, 'Language retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Language  $language
     * @return JsonResponse
     */
    public function show(Language $language)
    {
        return $this->sendResponse($language, 'Language retrieved successfully.');
    }

    /**
     * @param  UpdateLanguageRequest  $request
     * @param  Language  $language
     * @return JsonResponse
     */
    public function update(UpdateLanguageRequest $request, Language $language): JsonResponse
    {
        $input = $request->all();

        $this->languageRepository->updateLanguage($input, $language);

        return $this->sendSuccess(__('messages.flash.language_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Language  $language
     * @return JsonResponse
     *
     * @throws \Exception
     */
    public function destroy(Language $language)
    {
        if ($language->is_default == true) {
            return $this->sendError('Default Language can\'t be deleted.');
        }
        $usesLang = User::whereIsActive(1)->pluck('language')->toArray();
        if (in_array($language->iso_code, $usesLang)) {
            return $this->sendError('Uses Language can\'t be deleted.');
        }
        if ($language->iso_code == getSuperAdminSettingValue('default_language')) {
            return $this->sendError('Default Setting Language can\'t be deleted.');
        }

        $path = base_path('lang/').$language->iso_code;
        if (\File::exists($path)) {
            \File::deleteDirectory($path);
            $language->delete();
        }else{
            return $this->sendSuccess('Language not deleted.');
        }
        Artisan::call('lang:js');

        return $this->sendSuccess('Language deleted successfully.');
    }

    /**
     * @param  Language  $language
     * @param  Request  $request
     * @return Application|Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function showTranslation(Language $language, Request $request)
    {
        $selectedLang = $request->get('name', $language->iso_code);
        $selectedFile = $request->get('file', 'messages.php');
        $langExists = $this->languageRepository->checkLanguageExistOrNot($selectedLang);
        if (! $langExists) {
            return redirect()->back()->withErrors($selectedLang.' language not found.');
        }

        $fileExists = $this->languageRepository->checkFileExistOrNot($selectedLang, $selectedFile);
        if (! $fileExists) {
            return redirect()->back()->withErrors($selectedFile.' file not found.');
        }
        $oldLang = app()->getLocale();
        $data = $this->languageRepository->getSubDirectoryFiles($selectedLang, $selectedFile);
        $data['id'] = $language->id;
        app()->setLocale($oldLang);

        return view('sadmin.languages.translation-manager.index', compact('selectedLang', 'selectedFile'))->with($data);
    }

    /**
     * @param  Language  $language
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function updateTranslation(Language $language, Request $request): RedirectResponse
    {
        $lName = $language->iso_code;
        $fileName = $request->get('file_name');
        $fileExists = $this->languageRepository->checkFileExistOrNot($lName, $fileName);

        if (! $fileExists) {
            return redirect()->back()->withErrors('File not found.');
        }

        if (! empty($lName)) {
            $result = $request->except(['_token', 'translate_language', 'file_name']);

            File::put(base_path('lang/').$lName.'/'.$fileName, '<?php return '.var_export($result, true).'?>');
        }

        Artisan::call('lang:js');

        Flash::success(__('messages.flash.language_update'));

        return redirect()->route('languages.translation', $language->id);
    }

    public function getAllLanguage()
    {
        $getAllLanguage = Language::get();
        $currentLanguage = getCurrentLanguageName();

        return $this->sendResponse(['getAllLanguage' => $getAllLanguage, 'currentLanguage' => $currentLanguage],
            'language retrieve successfully');
    }
}
