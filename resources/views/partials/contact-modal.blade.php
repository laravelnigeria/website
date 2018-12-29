<div class="bg-white w-screen h-screen fixed z-50 py-10" id="contact-modal">
    <div class="w-full h-full flex flex-col container items-stretch overflow-y-scroll">
        <div class="self-end pb-5">
            <a
                href="#"
                onclick="toggleContactModal();return false;"
                class="transition text-grey-light text-4xl md:text-5xl no-underline hover:text-primary"
            >
                <i class="fa fa-times" style="pointer-events:none;"></i>
            </a>
        </div>
        <contact-form></contact-form>
    </div>
</div>
