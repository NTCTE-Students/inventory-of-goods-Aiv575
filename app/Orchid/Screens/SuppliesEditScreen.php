<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use App\Models\Supply;
use Orchid\Support\Facades\Toast;

class SuppliesEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Создание товара';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Создать товар')
                ->icon('bs.save')
                ->method('saveSupply')
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
            Layout::rows([

                Input::make('supply.name')
                ->title('Name')
                ->required(),

                TextArea::make('supply.description')
                ->title('Description')
                ->required()
                ->rows(5),

                Input::make('supply.price')
                ->title('Price (в копейках)')
                ->required()
                ->type('minber'),

                Input::make('supply.amont')
                ->title('Amount')
                ->required()
                ->type('number'),
            ])
        ];
    }

    public function saveSupply()
    {
        Supply::create(request()->input('supply'));

        Toast::success('Товар создан');
    }
}
