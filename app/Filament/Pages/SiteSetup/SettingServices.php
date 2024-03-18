<?php

namespace App\Filament\Pages\SiteSetup;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SettingServices extends Page
{
    protected static ?string $navigationLabel = 'Services Page';
    protected static ?string $navigationGroup = 'Site Settings';
    protected static string $view = 'filament.pages.site-setup.setting-services';
    public ?array $formData = [];
    public function mount(): void
    {
        $json_string = file_get_contents('../page-content.json');
        $json_array = json_decode($json_string, true);
        $loadData = $json_array["page-services"];
        $arr= [
            "gallery" => [
                "title"=> $loadData["gallery"]["title"],
                "image-1"=> $loadData["gallery"]["image-1"],
                "image-2"=> $loadData["gallery"]["image-2"],
            ],
            "page_setup" => [
                "title-page" => $loadData['title-page'],
                "keywords-seo" => $loadData['keywords-seo'],
                "description-seo" => $loadData['description-seo']
            ],
            "icon-blocks" => [
                "text-cap"=>$loadData['icon-blocks']["text-cap"],
                "h2-title"=>$loadData['icon-blocks']["h2-title"]
            ],
            "clients" => [
                "title"=>$loadData['clients']["title"],
                "img-client"=>$loadData['clients']["img-client"],
            ]
        ];
        $this->form->fill($arr);
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make('gallery')->schema([
                        TextInput::make('gallery.title'),
                        FileUpload::make('gallery.image-1'),
                        FileUpload::make('gallery.image-2'),
                    ]),
                    Section::make('Page Setup')->schema([
                        TextInput::make('page_setup.title-page'),
                        TextInput::make('page_setup.keywords-seo'),
                        Textarea::make('page_setup.description-seo'),
                    ])->grow(false),
                ])->from('md'),
                Split::make([
                    Section::make('icon-blocks')->schema([
                        TextInput::make('icon-blocks.text-cap'),
                        TextInput::make('icon-blocks.h2-title'),
                    ]),
                    Section::make('clients')->schema([
                        TextInput::make('clients.title'),
                        FileUpload::make('clients.img-client')->multiple(),
                    ]),
                ]),
            ])
        ->statePath('formData');

    }
    protected function submitActions(): array
    {
        return [
            Action::make('setupAboutPage')
                ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('setupAboutPage'),
        ];
    }
    public function submit(): void
    {
        $formData = $this->form->getState();
        $json_string = file_get_contents('../page-content.json');
        $json_array = json_decode($json_string, true);
        $json_array['page-services']["title-page"]=$formData['page_setup']['title-page'];
        $json_array['page-services']["keywords-seo"]=$formData['page_setup']['keywords-seo'];
        $json_array['page-services']["description-seo"]=$formData['page_setup']['description-seo'];
        $json_array['page-services']["gallery"]=$formData["gallery"];
        $json_array['page-services']["icon-blocks"]=$formData["icon-blocks"];
        $json_array['page-services']["clients"]=$formData["clients"];
        $newJsonString = json_encode($json_array);
        file_put_contents('../page-content.json', $newJsonString);
        Notification::make()
            ->title('Saved successfully')
            ->duration(10000)
            ->success()
            ->send();
    }
}
