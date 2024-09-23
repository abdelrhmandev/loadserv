<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
    <span class="menu-link menu-center">
        <span class="menu-icon me-0">
            <i class="fonticon-layers fs-1"></i>
        </span>
        <span class="menu-title">{{ __('invoice.plural') }}</span>
    </span>
    <div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px mh-75 overflow-auto">
        <div class="menu-item">
            <div class="menu-content">
                <span class="menu-section fs-5 fw-bolder ps-1 py-1">{{ __('invoice.plural') }}</span>
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title"> {{ __('invoice.plural') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
                @if (Auth::guard('admin')->user()->can('invoice-list', 'admin'))
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('admin.invoices.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('site.all') }} {{ __('invoice.plural') }}</span>
                    </a>
                </div>
                @endif
                @if (Auth::guard('admin')->user()->can('invoice-create', 'admin'))
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('admin.invoices.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('invoice.add') }}</span>
                    </a>
                </div>
                @endif
 

                @role('Administrator', 'admin')
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('admin.invoices.log') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('invoice.log') }}</span>
                    </a>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
