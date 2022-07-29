<x-scaffold>
<div class="app-toolbar align-items-center justify-content-between">
<!--begin::Toolbar wrapper-->
    <div class="d-flex flex-grow-1 flex-stack flex-wrap gap-2 mb-n10" id="kt_toolbar">
                        <!--begin::Page title-->
                        <div class="d-flex flex-column align-items-start me-3 gap-2">
                            <!--begin::Title-->
                            <h1 class="d-flex text-dark fw-bolder m-0 fs-3">Home</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Page title-->
                    </div>
                    <!--end::Toolbar wrapper-->
</div>

<div class="app-content flex-column-fluid">
            <div class="card">
                 <div class="card-body p-lg-20">
                   <div class="mb-17 m-5 p-5">
                        <!--begin::Content-->
                        <div class="d-flex flex-stack mb-5">
                            <!--begin::Title-->
                            <h3 class="text-dark">Specialities list</h3>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <a href="#" class="fs-6 fw-bold link-primary">View All Specialities</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9"></div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">
                            @foreach ($specialities as $speciality)
                            <!--begin::Col-->
                            <div class="col-md-4">
                                <!--begin::Hot sales post-->
                                <div class="card-xl-stretch me-md-6">
                                    <!--begin::Overlay-->
                                    <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href= {{$speciality->profile_img}}>
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('https://www.forumfisioterapia.com/wp-content/uploads/2021/01/casos-clinicos-768x465.png')"></div>
                                        <!--end::Image-->
                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Overlay-->
                                    <!--begin::Body-->
                                    <div class="mt-5">
                                        <!--begin::Title-->
                                        <a href="#" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{ $speciality->name }}</a>
                                        <!--end::Title-->
                                        <!--begin::Text-->
                                        <div class="fw-bold fs-5 text-gray-600 text-dark mt-3 ">{{ $speciality->description }}</div>
                                        <!--end::Text-->
                                        <!--begin::Text-->
                                        <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                                            <!--begin::Action-->
                                            <a href="{{ route('SingleSpecialityPage', $speciality->id) }}" class="btn btn-sm btn-primary">see Doctors List</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Hot sales post-->
                            </div>
                            <!--end::Col-->
                        @endforeach
                        </div>
                        <!--end::Row-->
            </div>
        </div>
    </div>
        </div>
</x-scaffold>
