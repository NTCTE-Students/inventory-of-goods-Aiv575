<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use App\Models\Supply;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\TD;
use App\Orchid\Layouts\SuppliesLayout;

class SuppliesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'supplies' => Supply::paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Товары';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Создать товар')
                ->icon('bs.plus')
                ->route('platform.supply'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            SuppliesLayout::class
            // Layout::table('supplies', [
            //     TD::make('id', 'ID')
            //     ->sort()
            //     ->filter(TD::FILTER_NUMERIC),
            //     TD::make('name', 'Название')
            //         ->sort()
            //         ->filter(TD::FILTER_TEXT),
            //     TD::make('description', 'Описание'),
            //     TD::make('price', 'Цена (в копейках)'),
            //     TD::make('amont', 'Количество'),
            //     TD::make('created_at', 'Дата создания')
            //         ->sort()
            //         ->render(function (Supply $supply) {
            //             return $supply->created_at->toDateString();
            //         }),
            //     TD::make('updated_at', 'Дата обновления')
            //         ->sort()
            //         ->render(function (Supply $supply) {
            //             return $supply->updated_at->toDateString();
            //         }),
            // ])
        ];
    }
}
