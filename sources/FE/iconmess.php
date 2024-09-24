<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <title>Trang Sản Phẩm Khuyến Mãi</title>
    <style>
    .iMAL {
    background: none;
    bottom: 24px;
    display: block;
    margin: 0px 12px;
    overflow: visible;
    padding: 0px;
    position: fixed;
    top: auto;
    z-index: 2147483644;
    border-radius: 30px;
    box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 12px 0px;
    height: 60px;
    width: 60px;
    right: 12px;
}


.lfwDmE {
    position: fixed;
    right: 25px;
    bottom: 90px;
    z-index: 9192;
    background: linear-gradient(90deg, rgb(245, 61, 45), rgb(255, 102, 51));
    padding: 10px;
    color: var(--white);
    border-radius: 50%;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    transition: 1s ease-out;
}

.hvUSUG {
    background: none;
    bottom: 158px;
    display: block;
    margin: 0px 12px;
    overflow: visible;
    padding: 0px;
    position: fixed;
    top: auto;
    z-index: 2147483644;
    border-radius: 30px;
    height: 56px;
    width: 56px;
    right: 18px;
}
/* .woofc-count.woofc-count-top-right:hover {
    top: 45px;
}.woofc-count i {
    font-size: 24px;
    line-height: 60px;
    color: #444;
}.woofc-icon-cart4:before {
    content: "\e909";
}.woofc-count span {
    position: absolute;
    top: -10px;
    right: -10px;
    height: 30px;
    width: 30px;
    font-size: 12px;
    line-height: 30px;
    text-align: center;
    background: #e94b35;
    color: #ffffff;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
} */
</style>
</head>

<body>
   
<!-- <div id="woofc-count" class="woofc-count woofc-count-top-right woofc-count-shake"><i class="woofc-icon-cart4"></i><span id="woofc-count-number" class="woofc-count-number">0</span></div> -->
<!-- <div in="out" class="styled__Container-w02dqd-0 dJuGDJ"><a class="styled__ToggleButton-w02dqd-1 fgcndB SendEvent" data-category="action" data-action="click" data-label="sticky_helper_action">Đóng</a><ul><li><a class="SendEvent" data-category="action_helper" data-action="click" data-label="Đơn hàng" href="/tra-cuu-don-hang"><svg viewBox="0 0 512 512"><path d="M112 356a8 8 0 00-8 8c0 4.411-3.589 8-8 8s-8-3.589-8-8 3.589-8 8-8a8 8 0 000-16c-13.234 0-24 10.767-24 24s10.766 24 24 24 24-10.767 24-24a8 8 0 00-8-8zM432 356a8 8 0 00-8 8c0 4.411-3.589 8-8 8s-8-3.589-8-8 3.589-8 8-8a8 8 0 000-16c-13.234 0-24 10.767-24 24s10.766 24 24 24 24-10.767 24-24a8 8 0 00-8-8z"></path><path d="M512 252a7.973 7.973 0 00-2.388-5.698c-3.421-9.455-10.352-17.394-19.723-22.08a7.901 7.901 0 00-.767-.334l-26.439-9.925-16.106-61.195a6.038 6.038 0 00-.074-.263C441.389 135.456 425.992 124 408.191 124H352v-16c0-8.822-7.178-16-16-16H16c-8.822 0-16 7.178-16 16v224c0 8.822 7.178 16 16 16h26.341a55.523 55.523 0 00-1.761 8H8a8 8 0 000 16h32.581c3.895 27.102 27.258 48 55.419 48s51.525-20.898 55.419-48H168c0 13.233 10.766 24 24 24h48c13.234 0 24-10.767 24-24h96.581c3.895 27.102 27.258 48 55.419 48s51.525-20.898 55.419-48H504a8 8 0 000-16h-32.581a55.523 55.523 0 00-1.761-8H496c8.822 0 16-7.178 16-16v-72c0-1.88-.131-3.735-.383-5.558A7.98 7.98 0 00512 252zm-16 48h-8v-8h8v8zm-6.101-56H352v-16h102.549l28.531 10.71a24.07 24.07 0 016.819 5.29zm-81.708-104c10.638 0 19.846 6.819 22.951 16.982L445.622 212H352v-72h56.191zM48.001 332H16v-40h248.004a8 8 0 000-16H16V108h320v224H144.002c-.661 0-1.3.089-1.915.24C131.975 317.61 115.092 308 96 308c-19.092 0-35.974 9.61-46.087 24.24a7.986 7.986 0 00-1.912-.24zM96 404c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.944 40-40 40zm55.419-48a55.523 55.523 0 00-1.761-8h19.718a23.89 23.89 0 00-1.376 8h-16.581zM248 372c0 4.411-3.589 8-8 8h-48c-4.411 0-8-3.589-8-8v-7.981l.001-.019-.001-.019V356c0-4.411 3.589-8 8-8h48c4.411 0 8 3.589 8 8v16zm14.624-24H362.341a55.523 55.523 0 00-1.761 8H264a23.89 23.89 0 00-1.376-8zM416 404c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.944 40-40 40zm48-72c-.66 0-1.299.089-1.913.24C451.974 317.61 435.092 308 416 308s-35.974 9.61-46.087 24.24a7.986 7.986 0 00-1.912-.24h-16v-72h144v16h-8c-8.822 0-16 7.178-16 16v8c0 8.822 7.178 16 16 16h8v16H464z"></path><path d="M200 356c-2.11 0-4.17.859-5.66 2.34A8.068 8.068 0 00192 364c0 2.109.85 4.17 2.34 5.66A8.055 8.055 0 00200 372c2.11 0 4.17-.851 5.66-2.34A8.07 8.07 0 00208 364c0-2.101-.85-4.17-2.34-5.66A8.089 8.089 0 00200 356zM296.004 292H312a8 8 0 000-16h-15.996a8 8 0 000 16z"></path></svg><span>Đơn hàng</span></a></li><li><a href="/danh-sach-yeu-thich" class="SendEvent" data-category="action_helper" data-action="click" data-label="Yêu thích"><svg viewBox="0 0 477.53 477.53"><path d="M438.48 58.61a130.815 130.815 0 00-95.573-41.711 130.968 130.968 0 00-95.676 41.694l-8.431 8.909-8.431-8.909C181.282 5.762 98.659 2.728 45.829 51.815a130.901 130.901 0 00-6.778 6.778c-52.072 56.166-52.072 142.97 0 199.13l187.36 197.58c6.482 6.843 17.284 7.136 24.127.654.224-.212.442-.43.654-.654l187.29-197.58c52.068-56.16 52.068-142.96-.001-199.12zm-24.695 175.62h-.017l-174.97 184.54-174.98-184.54c-39.78-42.916-39.78-109.23 0-152.15 36.125-39.154 97.152-41.609 136.31-5.484a96.482 96.482 0 015.484 5.484l20.804 21.948c6.856 6.812 17.925 6.812 24.781 0l20.804-21.931c36.125-39.154 97.152-41.609 136.31-5.484a96.482 96.482 0 015.484 5.484c40.126 42.984 40.42 109.42 0 152.13z"></path></svg><span>Yêu thích</span></a></li><li><a class="SendEvent" data-category="action_helper" data-action="click" data-label="Báo giá" href="/bao-gia"><svg viewBox="0 0 512 512"><path d="M122 480h268V116H122zm12-352h244v340H134z"></path><path d="M160 180h112v12H160zM160 212h80v12h-80zM160 260h192v12H160zM160 292h192v12H160zM160 356h192v12H160zM192 388h128v12H192zM160 324h192v12H160z"></path><path d="M326 68V32h-32V0h-76v32h-32v36H90v444h332V68zM198 44h32V12h52v32h32v40H198zm212 456H102V80h84v16h140V80h84z"></path></svg><span>Báo giá</span></a></li><li><a class="SendEvent" data-category="action_helper" data-action="click" data-label="Trợ giúp" href="/bai-viet/cau-hoi-thuong-gap-ve-van-phong-pham-faqs"><svg viewBox="0 0 23 23"><g transform="translate(-1254 -31)"><circle cx="11" cy="11" r="11" fill="none" stroke="#fff" transform="translate(1254.5 31.5)"></circle><text transform="translate(1261 48)"><tspan x="0" y="0" font-family="Helvetica,Helvetica Neue" font-size="14" font-weight="500">?</tspan></text></g></svg><span>Trợ giúp</span></a></li></ul></div> -->
<!-- <div class="phone__PhoneContainer-zlcjdw-0 lfwDmE"><a aria-label="0964 399 099" title="0964 399 099" href="tel: 0964 399 099" class="SendEvent" data-category="action" data-action="click" data-label="hot_phone_action"><span class="phone-icon"></span></a><span class="phone-number">0964 399 099</span></div> -->
<div class="phone__MessagerContainer iMAL"><a aria-label="" title="" href="https://www.facebook.com/vppfast" class="SendEvent" data-category="action" data-action="click" data-label="chat_action" target="_blank" rel="noopener noreferrer"><svg x="0" y="0" width="60px" height="60px"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g><circle fill="#0A7CFF" cx="30" cy="30" r="30"></circle><svg x="10" y="10"><g transform="translate(0.000000, -10.000000)" fill="#FFFFFF"><g id="logo" transform="translate(0.000000, 10.000000)"><path d="M20,0 C31.2666,0 40,8.2528 40,19.4 C40,30.5472 31.2666,38.8 20,38.8 C17.9763,38.8 16.0348,38.5327 14.2106,38.0311 C13.856,37.9335 13.4789,37.9612 13.1424,38.1098 L9.1727,39.8621 C8.1343,40.3205 6.9621,39.5819 6.9273,38.4474 L6.8184,34.8894 C6.805,34.4513 6.6078,34.0414 6.2811,33.7492 C2.3896,30.2691 0,25.2307 0,19.4 C0,8.2528 8.7334,0 20,0 Z M7.99009,25.07344 C7.42629,25.96794 8.52579,26.97594 9.36809,26.33674 L15.67879,21.54734 C16.10569,21.22334 16.69559,21.22164 17.12429,21.54314 L21.79709,25.04774 C23.19919,26.09944 25.20039,25.73014 26.13499,24.24744 L32.00999,14.92654 C32.57369,14.03204 31.47419,13.02404 30.63189,13.66324 L24.32119,18.45264 C23.89429,18.77664 23.30439,18.77834 22.87569,18.45674 L18.20299,14.95224 C16.80079,13.90064 14.79959,14.26984 13.86509,15.75264 L7.99009,25.07344 Z"></path></g></g></svg></g></g></svg></a></div>
</body>
</html>
