
<!--nav class="navbar navbar-default navbar-fixed-top"-->
<li <?php if($uri1==null){ } ?> >
  <a href='<?php echo site_url(''); ?>'>Home</a></li>
    <?php foreach($menu->result() as $menu): ?>
    <li <?php

    if($uri1==$menu->menu_url){}?> >
    <a href='<?php if($menu->view_type=='1'){
      echo $menu->content_id; }
    else if($menu->view_type=='2'){echo site_url('pages/'.$menu->content_id);}
    else if('hal/'.$menu->view_type=='4'){echo site_url('pages/'.$menu->content_id);}
    else{ echo site_url('pages/'.$menu->content_id); }?>'><?php echo $menu->menu_name?></a>
    
      <?php $child=$this->m_site->GetChildMenu($menu->menu_id); 
        if($child != null){
      ?>  
        <ul class="sub-menu">
      <?php foreach($child->result() as $child): ?> 
        <li class="blue"><a href="<?php if($child->view_type=='1'){echo  'pages/'.$child->content_id; }else if($child->view_type=='2'){echo site_url('pages/'.$child->content_id);}else if($child->view_type=='4'){echo site_url('pages/'.$child->content_id);}else{ echo site_url('pages/'.$menu->menu_url."/".$child->menu_url); }?>"><?php echo $child->menu_name ?></a></li>
      <?php endforeach; ?>  
        </ul>
      <?php 
        }
       ?>
</li>
<?php endforeach;?>   