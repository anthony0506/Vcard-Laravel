<footer class="border-top w-100 pt-4 mt-7">
    <div class="d-flex justify-content-between">
        <p class="fs-6 text-gray-600">All Rights Reserved ©{{ \Carbon\Carbon::now()->year }}
            <a href="#" class="text-decoration-none">{{ getAppName() }}</a>
        </p>
        @role(App\Models\Role::ROLE_SUPER_ADMIN)
            <div class="fs-6 text-gray-600">v{{ getCurrentVersion() }}</div>
        @endrole
    </div>
</footer>

