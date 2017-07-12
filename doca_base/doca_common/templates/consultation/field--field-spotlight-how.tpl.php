<?php
/**
 * @file
 * Default template implementation to display the value of a field.
 */
?>
<div class="spacer--bottom min-height__icon">
  <svg style="height:50px;width:50px;" viewBox="0 0 50 50" preserveAspectRatio="xMidYMid meet" version="1.1"
       xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="megaphone" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <path
        d="M46.9994058,0 C45.6129927,0 44.4444444,0.940839197 44.1077441,2.21839979 L5.72390572,13.7362523 C5.24856407,12.7062809 4.20875421,11.9932239 3.00059418,11.9932239 C1.34680135,11.9932239 0,13.3401095 0,15.0039093 L0,20.9955695 C0,22.6494657 1.34680135,23.9963513 3.00059418,23.9963513 C4.18894831,23.9963513 5.21885522,23.3031014 5.70409982,22.3028408 L13.6462666,25.0857441 L12.8837394,27.1952046 C12.1014062,29.5225437 13.368984,32.0479541 15.6862745,32.8204326 L19.835611,34.2069325 C20.9645474,34.5832682 22.1727075,34.5040396 23.2323232,33.9692468 C24.291939,33.434454 25.0841751,32.5233255 25.4604872,31.3943185 L26.114082,29.4532187 L44.0978412,35.7419859 C44.4246385,37.0393537 45.6030897,38 46.9994058,38 C48.6531987,38 50,36.6531144 50,34.9992181 L50,3.00078186 C50,1.34688559 48.6531987,0 46.9994058,0 L46.9994058,0 Z M4.00079224,20.9955695 C4.00079224,21.5501694 3.55515944,21.9958301 3.00059418,21.9958301 C2.44602892,21.9958301 2.00039612,21.5501694 2.00039612,20.9955695 L2.00039612,15.0039093 C2.00039612,14.4493094 2.44602892,14.0036487 3.00059418,14.0036487 C3.55515944,14.0036487 4.00079224,14.4493094 4.00079224,15.0039093 L4.00079224,20.9955695 L4.00079224,20.9955695 Z M23.5690236,30.76049 C23.3610616,31.3844149 22.9253317,31.889497 22.3410576,32.1767005 C21.7567835,32.4738077 21.0932858,32.5233255 20.4693999,32.3153505 L16.3200634,30.9288507 C15.0425827,30.5029971 14.3493761,29.1065937 14.7653001,27.8488402 L15.5377302,25.7492833 L24.2226183,28.7896794 L23.5690236,30.76049 L23.5690236,30.76049 Z M43.9988116,33.5929111 L6.00118835,20.2924159 L6.00118835,15.7466771 L43.9988116,4.33776388 L43.9988116,33.5929111 L43.9988116,33.5929111 Z M47.9996039,34.9992181 C47.9996039,35.5538181 47.5539711,35.9994788 46.9994058,35.9994788 C46.4547435,35.9994788 45.9992078,35.5538181 45.9992078,34.9992181 L45.9992078,3.00078186 C45.9992078,2.44618191 46.4547435,2.00052124 46.9994058,2.00052124 C47.5539711,2.00052124 47.9996039,2.44618191 47.9996039,3.00078186 L47.9996039,34.9992181 L47.9996039,34.9992181 Z"
        id="Shape" fill="#999999" sketch:type="MSShapeGroup"></path>
    </g>
  </svg>
</div>
<div class="heading--5">
  <?php foreach ($items as $delta => $item): ?>
    <?php print render($item); ?>
  <?php endforeach; ?>
</div>