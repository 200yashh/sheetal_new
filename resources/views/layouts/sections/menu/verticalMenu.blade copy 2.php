<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="{{ url('/admin') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                @include('_partials.macros', ['width' => 25, 'withbg' => '#696cff'])
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">{{ config('variables.templateName') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @foreach ($menuData[0]->menu as $menu)
            {{-- adding active and open class if child is active --}}

            {{-- menu headers --}}
            @if (isset($menu->menuHeader))
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">{{ $menu->menuHeader }}</span>
                </li>
            @else
                {{-- active menu method --}}
                @php
                    $activeClass = null;
                    // $currentRouteName = Route::currentRouteName();
                    $currentRouteName = Request::segment(2);
                    
                    if ($currentRouteName === $menu->slug) {
                        $activeClass = 'active';
                    } elseif (isset($menu->submenu)) {
                        if (gettype($menu->slug) === 'array') {
                            foreach ($menu->slug as $slug) {
                                if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
                                    $activeClass = 'active open';
                                }
                            }
                        } else {
                            if (str_contains($currentRouteName, $menu->slug) and strpos($currentRouteName, $menu->slug) === 0) {
                                $activeClass = 'active open';
                            }
                        }
                    }
                @endphp

                @php
                    $shouldShowMenu = [];
                    $userPermissions = auth()
                        ->user()
                        ->getAllPermissions()
                        ->pluck('name')
                        ->toArray();

                    $anyIterationFellInCondition = false;
                    
                    if (isset($menu->submenu)) {

                        //         // temporary code, needs to be removed later
                        // unset(
                        //     $userPermissions[3],
                        //     $userPermissions[4],
                        //     $userPermissions[5],
                        //     $userPermissions[13],
                        // );

                        // // If you want to reindex the array, you can use array_values
                        // $userPermissions = array_values($userPermissions);

                        // echo "<pre>";
                        // print_r($menu);
                        // print_r($userPermissions);
                        // echo "</pre>";

                        foreach ($menu->submenu as $submenu) {                                   
                            if (!in_array('admin.' . $submenu->slug . '.view', $userPermissions) && !in_array('admin.' . $submenu->slug . '.edit', $userPermissions) && !in_array('admin.' . $submenu->slug . '.add', $userPermissions)) {
                                 $anyIterationFellInCondition = true;
                                $shouldShowMenu[] = $submenu->slug;
                            }

                            // put that main menu code here:
                            if (empty($shouldShowMenu)):
                                $linkHref = isset($menu->url) ? url($menu->url) : 'javascript:void(0);';
                                $linkClass = isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link';
                                $linkTarget = isset($menu->target) && !empty($menu->target) ? 'target="_blank"' : '';

                                $iconHTML = '';
                                if (isset($menu->icon)) {
                                    $iconHTML = '<i class="' . $menu->icon . '"></i>';
                                }

                                $nameHTML = '';
                                if (isset($menu->name)) {
                                    $nameHTML = '<div>' . __($menu->name) . '</div>';
                                }

                                $menuHTML = '<li class="menu-item $activeClass">';
                                $menuHTML .= '<a href="$linkHref" class="$linkClass" $linkTarget>';
                                $menuHTML .=    $iconHTML;
                                $menuHTML .=    $nameHTML;
                                $menuHTML .= '</a>';
                                $menuHTML .= '</li>';


                                echo $menuHTML;
                            endif;

                    if (empty($shouldShowMenu)){

                    }

                        }
                    }

                    if ($anyIterationFellInCondition == false) {
                        $shouldShowMenu = [];
                    }
                @endphp


            @endif
        @endforeach
    </ul>

</aside>
