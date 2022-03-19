<?php
  function wp_get_menu_array( $menuLocationName = 's' ) {

    // Get our nav locations (set in our theme, usually functions.php)
    $menuLocations = get_nav_menu_locations(); 
    // This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);
    $menuID = $menuLocations[ $menuLocationName ]; // Get the *primary* menu ID


    $menu_array = wp_get_nav_menu_items( $menuID );
    $menu = array();

    function populate_children($menu_array, $menu_item)
    {
        $children = array();
        if (!empty($menu_array)){
            foreach ($menu_array as $k=>$m) {
                if ($m->menu_item_parent == $menu_item->ID) {
                    $children[$m->ID] = array();
                    $children[$m->ID]['ID'] = $m->ID;
                    $children[$m->ID]['title'] = $m->title;
                    $children[$m->ID]['url'] = $m->url;
                    $children[$m->ID]['icon'] = $m->post_excerpt;
                    $children[$m->ID]['target'] = $m->target;

                    if(  $m->classes[0] == ""  || $m->classes == NULL   ) {
                      $children[$m->ID]['classes']  = NULL;
                    } 
                    else {
                      $classSubMenu = array();
                      foreach( $m->classes as $class ):
                        if( $class != '' || strlen( $class) != 0 ) {
                          $classSubMenu[] = $class;
                        }
                      endforeach; 
                      $children[$m->ID]['classes']  = $classSubMenu;
                    }


                    unset($menu_array[$k]);
                    $children[$m->ID]['children'] = populate_children($menu_array, $m);
                }
            }
        };
        return $children;
    }

    foreach ($menu_array as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['icon'] = $m->post_excerpt;
            $menu[$m->ID]['target'] = $m->target;
            if(  $m->classes[0] == ""  || $m->classes == NULL   ) {
              $menu[$m->ID]['classes']  = NULL;
            } 
            else {
              $classSubMenu = array();
              foreach( $m->classes as $class ):
                if( $class != '' || strlen( $class) != 0 ) {
                  $classSubMenu[] = $class;
                }
              endforeach; 
              $menu[$m->ID]['classes']  = $classSubMenu;
            }


            $menu[$m->ID]['children'] = populate_children($menu_array, $m);
        }
    }

    return $menu;

  }

  function pupulate_submenu_html( $submenu ) {      
    echo '<ul class="submenu dropdown-menu">';      
      foreach ($submenu as $key => $dropdown_item): 
        $class_item = implode(" ", $dropdown_item['classes']);
        if( count( $dropdown_item['children'] ) <= 0 ) :
            echo '<li> <a class="dropdown-item '.$class_item.'" href="'.$dropdown_item['url'].'"> '.$dropdown_item['title'].' </a></li>';
        else : 
          echo '<li>
                  <a class="dropdown-item is-menu-item'.$class_item.'" href="#"> '.$dropdown_item['title'].' &raquo; </a>';
                  echo pupulate_submenu_html( $dropdown_item['children'] );
          echo '</li>';
        endif;
      endforeach; 
    echo '</ul>';
  }
?>