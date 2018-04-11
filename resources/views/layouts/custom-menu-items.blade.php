<!--Шаблон для вывода меню с использованием рекурсии-->
@foreach($items as $item)
    <!--Добавляем класс active для активного пункта меню-->
    @if(!$item->hasChildren())
        <li class="nav-item">
            <!-- метод url() получает ссылку на пункт меню (указана вторым параметром
            при создании объекта LavMenu)-->
            <a class="nav-link" href="{{$item->url()}}">{{ $item->title }}</a>
        @endif
        <!--Формируем дочерние пункты меню
        метод haschildren() проверяет наличие дочерних пунктов меню-->
        @if($item->hasChildren())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">{{ $item->title }}</a>
                <ul class="dropdown-menu">
                    @include(env('THEME').'.layouts.custom-menu-items', ['items'=>$item->children()])
                </ul>
            </li>
        @endif

        @endforeach