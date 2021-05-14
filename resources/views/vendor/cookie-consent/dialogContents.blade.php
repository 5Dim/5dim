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
<div class="row">
    <div class="col-md-4 col-sm-12 button-fixed">
        <div class="p-3 pb-4 bg-custom text-white">
            <div class="row">
                <div class="col-12">
                    <span class="cookie-consent__message">
                        {!! trans('cookie-consent::texts.message') !!}
                    </span>
                </div>
            </div>
            <p>
            </p>
            <button type="button" class="btn btn-success w-100 js-cookie-consent-agree cookie-consent__agree">
                {{ trans('cookie-consent::texts.agree') }}
            </button>
        </div>
    </div>
</div>
