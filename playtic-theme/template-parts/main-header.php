<?php 
  /*  MAIN HEADER */ 
  $menuWpPlaytic = wp_get_menu_array( 'menu-playtic-primary' );
  $visibleScroll = count($menuWpPlaytic) >= 8 ? 'visible-scroll' : '';
?>
<div class="sidebar-playtic main-header-playtic active">

  <div class="wave wave-1"></div>
  <div class="wave wave-2"></div>

  <div class="logo-content">
    <div class="logo">
      <i class='bx bxl-play-store icon-top'></i>
      <div class="logo-name">PlayTIC</div>
    </div>
    <i class='bx bx-menu-alt-left btn-menu-show' id="btn-primary-menu"></i>
  </div>

  <ul class="nav-list-navigation <?= $visibleScroll ?>" role="menu" aria-label="Menu principal PlayTIC">
    <!-- FORM SEARCH FOR THEME -->
    <li class="item-menu item-search"  role="menuitem">
        <?php get_template_part('template-parts/layout/partial_form_search') ?>
        <span class="tooltip-menu-link">
          Buscar
        </span>
    </li>
    <!-- NAVIGATION PRIMARY MENU -->
    <?php foreach  ($menuWpPlaytic as $key => $itemMenu ) : 
          $classItemMenu =  implode( " ", $itemMenu['classes'] );
          $targetItemMenu = $itemMenu['target'] == "" ? '_blank' : $itemMenu['target'];
    ?>
      <li class="item-menu item-<?= $key?> item-id-<?= $itemMenu['ID'] ?>" role="menuitem">
        <a  href="<?= $itemMenu['url'] ?>" 
            class="item-link <?= $classItemMenu ?>" 
            target="<?= $targetItemMenu ?>"
            aria-label="<?= $itemMenu['title'] ?>">
          <i class='item-icon <?= $itemMenu['icon'] ?>' ></i>
          <span class="item-title"  aria-label="<?= $itemMenu['title'] ?>"><?= $itemMenu['title'] ?></span>
        </a>
        <span class="tooltip-menu-link">
          <?= $itemMenu['title'] ?>
        </span>
      </li>
    <?php endforeach; ?>
  </ul>
  
  <div class="profile-content">
    <div class="profile">
      <div class="profile-details">
        <img src="https://picsum.photos/40/40" alt="User Name" class="profile-image">
        <div class="name-job">
          <div class="name">Fernando Jaramillo</div>
          <div class="job">Web Developer</div>
        </div>
      </div>
      <!-- <box-icon name='log-in'></box-icon> -->
      <i class='bx bx-log-out btn-logout-primary' id="btn-logout-primary" ></i>
    </div>
  </div>
</div>