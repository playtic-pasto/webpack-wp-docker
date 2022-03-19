<form action="<?php echo home_url('/');?>" 
      id="searchForm" 
      class="frm-search-playtic"
      autocomplete="off">
    <div class="input-group">
      <button class="btn btn-search-form" 
              type="submit" 
              title="Buscar en PlayTIC"
              id="searchFormButton">
              <i class='bx bx-search-alt'></i>
              <?php echo esc_attr_x( ' ', 'submit button' ) ?> 
      </button>
      <input  type="text"
              name="s" 
              require 
              placeholder="Buscar"  
              id="searchFormInput"
              value="<?php the_search_query(); ?>"  
              class="form-control control-search"  
              aria-label="Search" 
              aria-describedby="Search Form">
    </div>

</form>