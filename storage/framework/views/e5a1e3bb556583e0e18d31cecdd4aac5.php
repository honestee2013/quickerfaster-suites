<!----------  IMAGE CROPPER  ---------->
    <?php
        $__assetKey = '1596379042-0';

        ob_start();
    ?>
    <!---------- ASSETS - IMAGE CROPPER  ---------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">


    <!--- JPrint  ---->
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet">



    <style>
        /* General modal wrapper setup */
        .modal-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1040;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.4s ease, visibility 0s 0.4s;

        }

        /* Modal backdrop */
        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 1s ease;
        }

        /* Modal content */
        .modal-content {
            position: relative;
            top: -100%;
            transform: translateY(0);
            background-color: white;
            width: 80%;
            max-height: 99vh;
            /* Ensures modal fits within viewport height */
            min-height: 500px;
            /* Optional: Ensures modal has a minimum height */
            /* Enables scrolling for large content */
            border-radius: 8px;
            transition: top 0.6s ease, transform 1s ease;
            z-index: 1040;
        }


        /* When modal is open */
        .modal-wrapper.is-open {
            opacity: 1;
            visibility: visible !important;
            transition: opacity 0.4s ease;
        }

        /* Backdrop animation */
        .modal-wrapper.is-open .modal-backdrop {
            opacity: 1;
        }

        /* Modal content animation - Slide down */
        .modal-wrapper.is-open .modal-content {
            top: 1vh;
            /* Small gap from top of viewport */
            transform: translateY(0);
        }

        /* Modal body for scrollable content */
        .modal-body, .modal-form {
            max-height: 95vh;
            /* Optional: further limit content area within modal */

        }

        .modal-form {
            max-height: 60vh;
            overflow-y: auto;
        }

        .mainModal {
            max-width: 800px;
        }

        .childModal {
            max-width: 500px;
        }


        .input_control {
            max-height: 0.2em !important;
        }


    </style>
    <?php
        $__output = ob_get_clean();

        // If the asset has already been loaded anywhere during this request, skip it...
        if (in_array($__assetKey, \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys)) {
            // Skip it...
        } else {
            \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys[] = $__assetKey;

            // Check if we're in a Livewire component or not and store the asset accordingly...
            if (isset($this)) {
                \Livewire\store($this)->push('assets', $__output, $__assetKey);
            } else {
                \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$nonLivewireAssets[$__assetKey] = $__output;
            }
        }
    ?>
<?php /**PATH /Users/mac/LaravelProjects/quickerfaster-suites/app/Modules/Core/Resources/assets/data-tables/assets.blade.php ENDPATH**/ ?>