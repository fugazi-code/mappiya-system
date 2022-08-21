<x-app>
    <div>
        <div class="container-scroller">
            @include('partials.navbar')

            <!-- partial -->
            <div class="container-fluid page-body-wrapper">

                @include('partials.sidebar')

                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        {{ $slot }}
                    </div>
                    <!-- content-wrapper ends -->
                    @include('partials.footer')
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
    </div>
</x-app>

