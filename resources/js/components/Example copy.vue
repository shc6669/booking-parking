<template>
    <div>
        <!--begin::Toolbar-->
        <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column me-3">
                    <!--begin::Title-->
                    <h1 class="d-flex text-white fw-bolder my-1 fs-3">Parking Booking System</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-white opacity-75">Homepage</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Container-->
        <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
            <!--begin::Post-->
            <div class="content flex-row-fluid" id="kt_content">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="text-center">
                        <!--begin::Heading-->
                        <div class="card-px text-center pt-20 pb-5">
                            <!--begin::Title-->
                            <h2 class="fs-2x fw-bolder mb-0">Parking Booking System</h2>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <p class="text-gray-400 fs-4 fw-bold py-7">There are 4 endpoints on this system</p>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                    </div>
                    <!--end::Card headar-->
                    <!--begin::Card body-->
                    <div class="card-body pb-0">
                        <!--begin::Row-->
                        <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
                            <!--begin::Col-->
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <!--begin::Card-->
                                <div class="card h-100">
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                                        <!--begin::Name-->
                                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#kt_modal_availability">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-60px mb-5">
                                                <img src="frontend_assets/media/icons/duotune/general/gen037.svg" alt="Check Availability" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="fs-5 fw-bolder mb-2">Check Availability</div>
                                            <!--end::Title-->
                                        </a>
                                        <!--end::Name-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <!--begin::Card-->
                                <div class="card h-100">
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                                        <!--begin::Name-->
                                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#kt_modal_booking">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-60px mb-5">
                                                <img src="frontend_assets/media/icons/duotune/general/gen014.svg" alt="Booking" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="fs-5 fw-bolder mb-2">Booking</div>
                                            <!--end::Title-->
                                        </a>
                                        <!--end::Name-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <!--begin::Card-->
                                <div class="card h-100">
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                                        <!--begin::Name-->
                                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#kt_modal_fares">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-60px mb-5">
                                                <img src="frontend_assets/media/icons/duotune/general/gen005.svg" alt="Fares" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="fs-5 fw-bolder mb-2">Fares</div>
                                            <!--end::Title-->
                                        </a>
                                        <!--end::Name-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <!--begin::Card-->
                                <div class="card h-100">
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                                        <!--begin::Name-->
                                        <a href="#" class="text-gray-800 text-hover-primary d-flex flex-column" data-bs-toggle="modal" data-bs-target="#kt_modal_payment">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-60px mb-5">
                                                <img src="frontend_assets/media/icons/duotune/finance/fin002.svg" alt="Payment" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="fs-5 fw-bolder mb-2">Payment</div>
                                            <!--end::Title-->
                                        </a>
                                        <!--end::Name-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end:Row-->
                        <!--begin::Illustration-->
                        <div class="text-center px-5">
                            <img src="frontend_assets/media/illustrations/sigma-1/3.png" alt="Parking Booking System" class="mw-100 h-200px h-sm-325px" />
                        </div>
                        <!--end::Illustration-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                
                <!--begin::Modal Available-->
                <modal-available />
                <!--end::Modal Available-->
                
                <!--begin::Modal Booking-->
                <modal-booking />
                <!--end::Modal Booking-->

                <!--begin::Modal Fares-->
                <modal-fares />
                <!--end::Modal Fares-->

                <!--begin::Modal Payment-->
                <modal-payment />
                <!--begin::end Available-->
            </div>
            <!--end::Post-->
        </div>
        <!--end::Container-->
    </div>
</template>

<script>
    import ModalAvailable from './Modal-Availability'
    import ModalBooking from './Modal-Booking'
    import ModalFares from './Modal-Fares'
    import ModalPayment from './Modal-Payment'
    export default {
        name: 'Homepage',
        components: {
            ModalAvailable,
            ModalBooking,
            ModalFares,
            ModalPayment
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>