<li>
{{--    <a href="{{ $category->slug ? route('category.show', $category->slug) : '#' }}">--}}
    <a href="#">
        {{ $category->name }}
    </a>

    @if($category->children->isNotEmpty())
        <ul class="submenu">
            @foreach($category->children as $child)
                <x-category-menu-item class="child" :category="$child" />
            @endforeach
        </ul>
    @endif
</li>

<style>
    /* Базовые настройки для меню */
    nav .menu > li,                /* или .main-menu > li — подставь свой селектор */
    .has-submenu {
        position: relative;        /* ← очень важно! */
    }

    /* Само подменю */
    .submenu {
        position: absolute;
        top: 100%;                 /* сразу под родителем */
        left: 0;
        min-width: 220px;          /* или под твою ширину */
        background: white;
        border: 1px solid #e5e5e5;
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
        padding: 8px 0;
        margin: 0;
        list-style: none;
        z-index: 1000;             /* базовый уровень */
        opacity: 0;
        visibility: hidden;
        transform: translateY(8px);
        transition: all 0.18s ease;
        pointer-events: none;      /* пока не видно — не кликабельно */
    }

    /* Показываем при наведении */
    .has-submenu:hover > .submenu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        pointer-events: auto;
    }

    /* Подменю второго и следующих уровней */
    .submenu .submenu {
        top: 0;                    /* прижато к правому краю родителя */
        left: 100%;
        margin-left: 1px;          /* небольшой отступ, чтобы не слипалось */
    }

    /* Увеличиваем z-index для вложенных уровней (на всякий случай) */
    .submenu .submenu {
        z-index: 1001;
    }

    /* Если меню внутри фиксированного/прилипающего хедера — повышаем ещё */
    header, .sticky, .navbar, nav {
        position: relative;        /* или sticky/fixed — но важно relative для z-index */
        z-index: 999;              /* хедер выше контента */
    }
</style>
