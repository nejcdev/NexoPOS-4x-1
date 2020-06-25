<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? __( 'Unamed Page' ) }}</title>
    <link rel="stylesheet" href="{{ asset( 'css/app.css' ) }}">
    @yield( 'layout.dashboard.header' )
</head>
<body>
    <div class="h-full w-full flex flex-col">
        <div id="dashboard-body" class="overflow-hidden flex flex-auto">
            <div id="dashboard-aside" class="w-64 flex-shrink-0 bg-gray-900 h-full flex-col overflow-hidden">
                <div class="overflow-y-auto h-full text-sm">
                    <div class="logo py-4 flex justify-center items-center">
                        <h1 class="font-black text-white text-3xl">NexoPOS</h1>
                    </div>
                    <ul>
                        @foreach( $menus->getMenus() as $identifier => $menu )
                        <menu-element identifier="{{ $identifier }}" label="{{ @$menu[ 'label' ] }}" icon="{{ @$menu[ 'icon' ] }}" href="{{ @$menu[ 'href' ] }}" notification="{{ isset( $menu[ 'notification' ] ) ? $menu[ 'notification' ] : 0 }}" id="menu-{{ $identifier }}">
                        @if ( isset( $menu[ 'childrens' ] ) )
                            @foreach( $menu[ 'childrens' ] as $identifier => $menu )
                            <sub-menu-element href="{{ $menu[ 'href' ] }}" id="submenu-{{ $identifier }}">{{ $menu[ 'label' ] }}</sub-menu-element>
                            @endforeach        
                        @endif
                        </menu-element>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex flex-auto overflow-hidden bg-gray-200">
                <div class="flex-1 overflow-y-auto">
                    @yield( 'layout.dashboard.body' )
                </div>
            </div>
        </div>
    </div>
    @include( '../common/footer' )
</body>
</html>