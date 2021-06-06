<style type="text/css">
    body {
        background-color: #1B1464;
        font-family: "Nunito Sans";
    }

    .bg-custom {
        background-color: #0f0e11;
    }

    .button-fixed {
        bottom: 0;
        position: fixed;
        right: 0;
        border-radius: 4px;
    }

    .fas {
        cursor: pointer;
        font-size: 24px;
    }

    p {
        font-size: 14px;
    }

</style>
<div class="row js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2">
    <div class="col-md-4 col-sm-12 button-fixed max-w-7xl mx-auto px-6">
        <div class="p-3 pb-4 bg-custom text-white p-2 rounded-lg bg-yellow-100">
            <div class="row flex items-center justify-between flex-wrap">
                <div class="col-12 ml-3 text-yellow-600 cookie-consent__message">
                    <span class="cookie-consent__message ml-3 text-yellow-600 cookie-consent__message">
                        {!! trans('cookie-consent::texts.message') !!}
                    </span>
                </div>
            </div>
            <div class="mt-2 flex-shrink-0 w-full sm:mt-0 sm:w-auto">
                <a type="button"
                    class="btn btn-success js-cookie-consent-agree cookie-consent__agree flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-300">
                    {{ trans('cookie-consent::texts.agree') }}
                </a>

            </div>
        </div>
    </div>
</div>
