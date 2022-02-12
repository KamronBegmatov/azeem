
<!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="#" class="brand-link elevation-4">
         <img src="{{asset('/img/logo.png')}}" class="brand-image" style="opacity: .8">
         <span> Muslim</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent " data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                     <a href="{{route('allah_names.index')}}" class="nav-link {{request()->is('allahNames') ? 'active' : '' }} ">
                         <i class=" fas fa-sort-alpha-up nav-icon"></i>

                         <p>Allah names</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('allah_name_langs.index')}}" class=" nav-link {{request()->is('allahNameLangs') ? 'active' : '' }}">
                         <i class="fas fa-sort-alpha-up nav-icon"></i>
                         <p>Allah names translations</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('shahadas.index')}}" class="nav-link {{request()->is('shahadas') ? 'active' : '' }}">
                         <i class="fas fa-praying-hands nav-icon"></i>
                         <p>Shahada</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('reciters.index')}}" class="nav-link">
                         <i class="fas fa-book-reader nav-icon"></i>
                         <p>Reciters</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('reciter_langs.index')}}" class="nav-link">
                         <i class="fas fa-book-reader nav-icon"></i>
                         <p>Reciter Languages</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('system_words.index')}}" class="nav-link  {{request()->is('systemWords') ? 'active' : '' }}">
                         <i class="fas fa-list-ol nav-icon"></i>
                         <p>System words</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('languages.index')}}" class="nav-link  {{request()->is('languages') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-language"></i>
                         <p>Languages</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('select_from_lists.index')}}" class="nav-link  {{request()->is('select_from_lists') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-language"></i>
                         <p>Selects</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('styles.index')}}" class="nav-link  {{request()->is('styles') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-language"></i>
                         <p>Styles</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('sura_reciters.index')}}" class="nav-link  {{request()->is('sura_reciters') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-language"></i>
                         <p>Sura-reciters</p>
                     </a>
                 </li>
                     </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
