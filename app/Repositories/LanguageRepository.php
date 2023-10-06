<?php

namespace App\Repositories;

use App\Models\Language;
use DB;
use File;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class LanguageRepository
 */
class LanguageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'language',
        'iso_code',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Language::class;
    }

    /**
     * @param $input
     * @return bool
     */
    public function translationFileCreate($input): bool
    {
        try {
            if (! empty($input['iso_code'])) {
                //Make directory in lang folder
                File::makeDirectory(base_path('lang').'/'.$input['iso_code']);

                //Copy all en folder files to new folder.
                $filesInFolder = File::files(App::langPath().'/en');
                foreach ($filesInFolder as $path) {
                    $file = basename($path);
                    File::copy(App::langPath().'/en/'.$file, App::langPath().'/'.$input['iso_code'].'/'.$file);
                }
            }

            return true;
        } catch (\Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $selectedLang
     * @return bool
     */
    public function checkLanguageExistOrNot($selectedLang)
    {
        $langExists = true;
        $allLanguagesArr = [];
        try {
            $languages = File::directories(base_path('lang'));
            foreach ($languages as $language) {
                $allLanguagesArr[] = substr($language, -2);
            }
            if (! in_array($selectedLang, $allLanguagesArr)) {
                $langExists = false;
            }

            return $langExists;
        } catch (\Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $selectedLang
     * @param $selectedFile
     * @return mixed
     */
    public function checkFileExistOrNot($selectedLang, $selectedFile)
    {
        $fileExists = true;
        $data['allFiles'] = [];
        try {
            $files = File::allFiles(App::langPath().'/'.$selectedLang.'/');
            foreach ($files as $file) {
                $data['allFiles'][] = ucfirst(basename($file));
            }

            if (! in_array(ucfirst($selectedFile), $data['allFiles'])) {
                $fileExists = false;
            }

            return $fileExists;
        } catch (\Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $selectedLang
     * @param $selectedFile
     * @return mixed
     */
    public function getSubDirectoryFiles($selectedLang, $selectedFile)
    {
        $data['allFiles'] = [];
        try {
            $files = File::allFiles(App::langPath().'/'.$selectedLang.'/');
            foreach ($files as $file) {
                $data['allFiles'][basename($file)] = ucfirst(basename($file));
            }

            $data['languages'] = File::directories(base_path('lang'));
            $data['allLanguagesArr'] = [];
            foreach ($data['languages'] as $language) {
                $lName = substr($language, -2);
                $data['allLanguagesArr'][$lName] = strtoupper(substr($language, -2));
                app()->setLocale(substr($selectedLang, -2));
                $data['languages'] = trans(pathinfo($selectedFile, PATHINFO_FILENAME));
            }

            return $data;
        } catch (\Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $language
     * @return bool
     */
    public function updateLanguage($input, $language): bool
    {
        try {
            DB::begintransaction();

            $oldLang = $language->iso_code;

            $language->update($input);

            $ifChange = $language->iso_code != $oldLang;
            if ($ifChange) {
                $ifExist = $this->checkLanguageExistOrNot($language->iso_code);
                if ($ifExist) {
                    throw new UnprocessableEntityHttpException($language->iso_code.__('messages.placeholder.lang_already_exists'));
                }

                File::move(App::langPath().'/'.$oldLang.'/', App::langPath().'/'.$language->iso_code);
            }

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
