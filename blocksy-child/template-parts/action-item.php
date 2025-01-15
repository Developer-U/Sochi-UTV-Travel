<?php
/**
 * Displaying Block Action item
 * Отображает карточку Акции в листинге
 */
$action_preview_text = get_field('action_preview_text');
?>

<li class="action-item position-relative js-item"
    style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>'); background-size: cover; background-repeat: no-repeat">
    <span class="action-item__gift position-absolute">
        <svg width="154" height="160" viewBox="0 0 154 160" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_202_868)">
                <path
                    d="M131.077 65.1323L125.525 66.0153L115.026 67.6859V74.1982L122.261 73.0462V131.705L78.42 138.684V128.82L65.5178 130.854V140.741L21.6772 147.72V89.0615L29.1067 87.8794V81.3671L18.4131 83.0677L12.8605 83.9543V69.3193L65.5178 60.9382V70.8695L78.42 68.8362V58.8819L131.077 50.5008V65.1323ZM49.9351 43.6523C50.1568 43.3514 50.5932 43.1019 51.2354 42.9993C52.4808 42.8011 54.4872 43.1692 57.1464 44.8432C60.7884 47.1349 64.5989 51.0034 67.3805 54.1286L66.5201 54.2666C60.5187 53.0173 55.3475 51.0742 52.0231 48.7188C49.5608 46.9774 49.2255 44.6203 49.9333 43.654L49.9351 43.6523ZM68.3473 24.2215C68.7074 19.378 71.2513 16.09 73.4564 15.7413C73.4972 15.7325 73.5433 15.7289 73.5841 15.7219C75.7697 15.4883 78.028 18.5976 77.8275 25.9894C77.785 27.4918 77.6572 29.0863 77.4639 30.7214C77.4514 30.8488 77.4319 30.978 77.416 31.1019C77.3645 31.5249 77.3131 31.9443 77.2528 32.3725C77.2137 32.6539 77.1694 32.9388 77.125 33.2237C77.086 33.4962 77.0487 33.7652 77.0062 34.0378C76.0269 40.1838 74.3736 46.5616 73.0874 51.0565C73.0839 51.0529 73.0839 51.0494 73.0839 51.0494C72.7717 50.2017 72.4772 49.3682 72.204 48.556C70.3785 43.1355 69.3709 38.4495 68.8281 34.5899C68.1415 29.711 68.2019 26.1628 68.3473 24.2197V24.2215ZM90.8646 39.4741C93.5256 36.9541 95.5337 35.9454 96.7791 35.7472C97.4212 35.6446 97.8612 35.7579 98.0794 35.9879C98.789 36.7276 98.4519 39.1927 95.9932 41.7163C92.6687 45.1317 87.4975 48.7205 81.4997 51.8811L80.634 52.0192C83.4138 48.0074 87.2137 42.9356 90.8646 39.4759V39.4741ZM134.341 43.47L100.119 48.9152C106.664 44.6539 110.37 38.7539 110.02 33.006C109.722 28.0811 106.43 24.2657 101.826 23.5101C99.5021 23.1296 93.8413 23.1473 87.5827 30.0189C88.2054 28.0652 88.7571 26.1168 89.213 24.2073C91.8119 13.3116 89.6494 5.06503 83.279 1.57882C78.0315 -1.29332 70.7688 -0.18198 65.2127 4.34479C58.4946 9.81655 55.7485 18.8789 57.8701 28.5961C58.2108 30.1516 58.6684 31.785 59.1829 33.4502C53.4316 29.7039 48.3545 31.3213 46.1884 32.369C41.5867 34.5881 38.2924 39.4547 37.9944 44.4734C37.6449 50.3327 41.349 55.0506 47.8897 57.229L9.59812 63.3255C7.79398 63.6139 6.33398 65.3039 6.33398 67.1037V88.2457C6.33398 90.0454 7.79398 91.2683 9.59812 90.9833L15.1507 90.1003V152.012C15.1507 153.811 16.6107 155.038 18.4149 154.749L68.7837 146.733L75.1577 145.715L125.527 137.699C127.331 137.41 128.791 135.724 128.791 133.924V72.0091L134.343 71.1261C136.144 70.8376 137.607 69.1476 137.607 67.3514V46.2059C137.607 44.4061 136.144 43.1833 134.343 43.4718L134.341 43.47Z"
                    fill="#E35A4D" />
                <path
                    d="M53.3791 108.759V123.605L47.3014 124.55L46.5794 122.007C45.8662 122.989 44.8888 123.894 43.6328 124.706C42.3786 125.525 40.9398 126.06 39.3202 126.313C36.253 126.79 34.0373 126.104 32.6695 124.26C31.3018 122.416 30.6152 119.077 30.6152 114.238C30.6152 109.301 31.5395 105.687 33.388 103.396C35.24 101.1 38.4297 99.6015 42.9675 98.8937C46.6131 98.3309 49.7193 98.2053 52.2774 98.5309L51.6672 104.457C47.8158 105.008 44.9278 105.434 43.0048 105.732C41.5341 105.958 40.546 106.547 40.0387 107.499C39.5313 108.453 39.2776 110.25 39.2776 112.892C39.2776 115.484 39.5047 117.181 39.9606 117.985C40.4165 118.785 41.3017 119.084 42.6216 118.878C43.5068 118.74 44.4577 118.519 45.4724 118.213V109.986L53.3773 108.759H53.3791Z"
                    fill="#E35A4D" />
                <path d="M65.728 121.683L57.5605 122.956V97.1506L65.728 95.8817V121.683Z" fill="#E35A4D" />
                <path
                    d="M89.4466 98.2548L80.2875 99.6759C79.7802 99.7555 79.3828 99.9449 79.0901 100.237C78.8009 100.532 78.6537 100.881 78.6537 101.277V104.305L88.0417 102.849V108.234L78.6537 109.69V119.676L70.4082 120.958V100.877C70.4082 99.1326 70.9901 97.6284 72.1538 96.3595C73.3193 95.0942 74.8148 94.3209 76.6402 94.036C83.023 93.0468 87.4172 92.5353 89.8281 92.5123L89.4466 98.2566V98.2548Z"
                    fill="#E35A4D" />
                <path
                    d="M114.375 94.3811L107.038 95.5207V115.265L98.7942 116.546V96.8019L91.457 97.9451V91.8841L114.375 88.3235V94.3811Z"
                    fill="#E35A4D" />
                <path
                    d="M37.2882 90.801L35.115 90.2029C34.2298 89.9569 33.6 89.6136 33.231 89.1783C32.8621 88.7429 32.6758 88.1306 32.6758 87.3414C32.6758 86.138 33.0093 85.2532 33.6763 84.6993C34.3416 84.1454 35.5088 83.7366 37.1746 83.4765C38.7694 83.234 40.0946 83.2075 41.1501 83.4057L40.9408 85.6053C39.6759 85.7805 38.3916 85.9699 37.093 86.1699C36.6956 86.2336 36.426 86.3008 36.2876 86.3751C36.1493 86.4495 36.0818 86.568 36.0818 86.7344C36.0818 86.8813 36.1457 86.9927 36.277 87.0706C36.4118 87.1467 36.6619 87.2334 37.0309 87.3201L39.0107 87.8227C39.9101 88.0687 40.5416 88.412 40.9106 88.8509C41.2796 89.2933 41.4659 89.9162 41.4659 90.7143C41.4659 91.9318 41.1413 92.8344 40.4991 93.4237C39.8551 94.0094 38.6861 94.4359 36.9972 94.6978C35.5727 94.919 34.1606 94.9633 32.768 94.8252L32.9738 92.4238C35.0653 92.1513 36.3923 91.969 36.9493 91.8823C37.3822 91.815 37.6713 91.7443 37.8133 91.6717C37.9552 91.5992 38.0244 91.4894 38.0244 91.3425C38.0244 91.1992 37.9765 91.086 37.8736 91.0063C37.7778 90.9302 37.5791 90.863 37.2828 90.8046L37.2882 90.801Z"
                    fill="#E35A4D" />
                <path
                    d="M52.6011 81.2998V87.6139C52.6011 89.3269 52.2552 90.5852 51.558 91.3886C50.8626 92.1955 49.6581 92.7264 47.9479 92.9954C46.0995 93.2839 44.7991 93.137 44.0523 92.553C43.3036 91.9726 42.9258 90.8276 42.9258 89.1146V82.804L46.3638 82.2696V88.5801C46.3638 89.4437 46.4596 90.0012 46.6494 90.2578C46.8392 90.5161 47.2135 90.6011 47.7759 90.5144C48.324 90.4277 48.6948 90.2259 48.8828 89.9127C49.0727 89.5995 49.1685 89.0102 49.1685 88.1483V81.8342L52.6029 81.2998H52.6011Z"
                    fill="#E35A4D" />
                <path
                    d="M57.8624 84.924L59.0492 84.7382C59.5459 84.6621 59.8777 84.54 60.0409 84.3666C60.2005 84.1967 60.2857 83.8888 60.2857 83.4411C60.2857 82.9933 60.2023 82.712 60.0409 82.5934C59.8777 82.4713 59.5459 82.4501 59.0492 82.5261L57.8624 82.712V84.924ZM64.1654 90.2577L60.5713 90.8152L59.8582 87.7325C59.7978 87.4511 59.6985 87.2706 59.5654 87.1909C59.4342 87.1149 59.2195 87.0972 58.9233 87.1432L57.8606 87.3095V91.2346L54.4883 91.7602V81.006C55.5669 80.737 57.1102 80.4433 59.129 80.1283C60.7753 79.8752 61.9568 79.9301 62.6699 80.2982C63.3831 80.6627 63.7379 81.4608 63.7379 82.6872C63.7379 84.2427 62.9999 85.2142 61.5204 85.5876V85.6814C62.512 85.6531 63.1099 86.1238 63.3121 87.0865L64.1654 90.2595V90.2577Z"
                    fill="#E35A4D" />
                <path
                    d="M68.9495 83.5154L70.0565 83.342C70.5195 83.2677 70.8335 83.1367 70.9896 82.9456C71.1475 82.7527 71.2273 82.4112 71.2273 81.9121C71.2273 81.406 71.1475 81.0768 70.9896 80.93C70.8317 80.7831 70.5177 80.7441 70.0565 80.8185L68.9495 80.9919V83.5172V83.5154ZM65.5098 90.0472V79.2966C66.5884 79.024 68.1317 78.7303 70.1381 78.4224C71.8784 78.1498 73.0687 78.2206 73.7074 78.6312C74.3496 79.0417 74.6671 79.9567 74.6671 81.3777C74.6671 82.7828 74.3708 83.7844 73.7783 84.3843C73.1876 84.986 72.1321 85.4019 70.6135 85.639C70.0423 85.731 69.487 85.7823 68.9513 85.8053V89.5128L65.5115 90.0472H65.5098Z"
                    fill="#E35A4D" />
                <path
                    d="M79.4325 81.5723L80.6193 81.3901C81.1161 81.3104 81.4478 81.1848 81.611 81.0184C81.7742 80.845 81.854 80.5353 81.854 80.0894C81.854 79.6452 81.7742 79.3603 81.611 79.2382C81.4478 79.1196 81.1161 79.1001 80.6193 79.1745L79.4325 79.3603V81.5723ZM85.7355 86.9061L82.1414 87.4635L81.4283 84.3808C81.368 84.0994 81.2686 83.9189 81.1356 83.8428C81.0043 83.7632 80.7896 83.7472 80.4934 83.795L79.4308 83.9578V87.8829L76.0566 88.4085V77.6579C77.1352 77.3853 78.6786 77.0916 80.6974 76.7801C82.3437 76.5235 83.5251 76.5819 84.2383 76.9429C84.9514 77.3146 85.3062 78.1109 85.3062 79.3373C85.3062 80.8928 84.5682 81.8608 83.0923 82.2342V82.3297C84.0839 82.2979 84.6782 82.7651 84.8805 83.7313L85.7337 86.9043L85.7355 86.9061Z"
                    fill="#E35A4D" />
                <path d="M90.5057 86.1663L87.0996 86.6902V75.9395L90.5057 75.4086V86.1663Z" fill="#E35A4D" />
                <path
                    d="M96.7452 81.5617L94.572 80.9636C93.6868 80.7176 93.0571 80.3778 92.6881 79.9425C92.3191 79.5036 92.1328 78.8931 92.1328 78.1021C92.1328 76.8987 92.4663 76.0174 93.1351 75.4635C93.7986 74.9061 94.9676 74.5008 96.6334 74.2407C98.2282 73.9912 99.5534 73.9682 100.609 74.1699L100.4 76.366C99.1348 76.543 97.8504 76.7306 96.5554 76.9323C96.1545 76.9925 95.8848 77.0597 95.7464 77.1341C95.6081 77.2102 95.5406 77.3287 95.5406 77.4968C95.5406 77.6402 95.6045 77.7534 95.7358 77.8331C95.8706 77.9092 96.1207 77.9923 96.4897 78.0791L98.4695 78.5852C99.3671 78.8294 100 79.1709 100.369 79.6133C100.738 80.0558 100.925 80.6769 100.925 81.4733C100.925 82.6908 100.6 83.5933 99.9597 84.179C99.3139 84.7719 98.1466 85.1966 96.4578 85.4567C95.0333 85.6815 93.6212 85.7222 92.2286 85.5841L92.4344 83.1827C94.5259 82.9102 95.8529 82.7315 96.4099 82.6448C96.8428 82.5775 97.1319 82.5067 97.2738 82.4306C97.4158 82.3581 97.4885 82.2484 97.4885 82.1015C97.4885 81.9581 97.437 81.8449 97.3377 81.7688C97.2384 81.6927 97.0397 81.6219 96.7434 81.5635L96.7452 81.5617Z"
                    fill="#E35A4D" />
                <path
                    d="M110.472 80.5335L110.63 82.8925C109.575 83.1933 107.68 83.5526 104.946 83.9773C104.196 84.0958 103.582 83.9684 103.105 83.5862C102.621 83.211 102.383 82.6571 102.383 81.9316V75.9484C102.383 75.221 102.621 74.591 103.105 74.0655C103.584 73.5381 104.196 73.2196 104.946 73.101C107.68 72.6745 109.575 72.448 110.63 72.4232L110.472 74.8299L106.467 75.4511C106.264 75.4829 106.106 75.5608 105.991 75.6811C105.876 75.8033 105.815 75.9466 105.815 76.1129V77.157L109.905 76.5235V78.7674L105.815 79.4009V80.6946C105.815 80.8609 105.876 80.9866 105.991 81.0733C106.106 81.16 106.264 81.1883 106.467 81.1564L110.472 80.5318V80.5335Z"
                    fill="#E35A4D" />
                <path
                    d="M21.0269 44.4185C14.3035 47.326 12.6058 49.2249 10.5125 56.1884C8.41562 49.7363 6.72147 48.248 -0.00195312 46.9809C6.72147 44.0734 8.41562 42.1728 10.5125 35.2128C12.604 41.6631 14.3017 43.1497 21.0269 44.4203V44.4185Z"
                    fill="#E35A4D" />
                <path
                    d="M39.3662 20.9052C36.0027 22.358 35.1547 23.3101 34.1098 26.7893C33.0632 23.5614 32.2135 22.8199 28.8535 22.1864C32.2135 20.7335 33.065 19.7814 34.1098 16.3023C35.1565 19.5301 36.0027 20.2716 39.3662 20.9052Z"
                    fill="#E35A4D" />
                <path
                    d="M143.306 148.232C136.583 151.139 134.885 153.04 132.792 160C130.697 153.549 129.001 152.063 122.277 150.792C129.001 147.885 130.695 145.984 132.792 139.024C134.883 145.474 136.581 146.964 143.306 148.232Z"
                    fill="#E35A4D" />
                <path
                    d="M153.999 128.378C150.635 129.831 149.787 130.783 148.741 134.262C147.691 131.034 146.844 130.293 143.484 129.659C146.844 128.206 147.692 127.254 148.741 123.775C149.787 127.003 150.634 127.744 153.999 128.378Z"
                    fill="#E35A4D" />
            </g>
            <defs>
                <clipPath id="clip0_202_868">
                    <rect width="154" height="160" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </span>

    <div class="route-item__wrap position-relative archive-route d-grid">
        <div class="archive-route__top">
            <h3 class="route-item__title route-item__title_actions">
                <?php the_title(); ?>
            </h3>

            <?php if ($action_preview_text) {
                echo '<div class="action-item__excerpt">' . $action_preview_text . '</div>';
            } ?>
        </div>

        <div class="archive-route__bottom archive-route__bottom_actions d-flex gap-2 align-items-start js-item">
            <div class="actions__btns col-auto">
                <button type="button" class="button green js-item-open">Забронировать</button>

                <div class="route-item__form js-item-content">
                    <?php echo do_shortcode('[contact-form-7 id="3e7efee" title="Быстрое бронирование по направлению"]'); ?>
                </div>
            </div>

            <a href="<?php the_permalink(); ?>" class="button gold col-auto">Узнать больше</a>
        </div>
    </div>
</li>