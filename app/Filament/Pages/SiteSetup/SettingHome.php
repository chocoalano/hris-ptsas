<?php

namespace App\Filament\Pages\SiteSetup;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SettingHome extends Page
{
    protected static ?string $navigationLabel = 'Home Page';
    protected static ?string $navigationGroup = 'Site Settings';
    protected static string $view = 'filament.pages.site-setup.setting-home';
    public ?array $formData = [];
    public function mount(): void
    {
        $json_string = file_get_contents('../page-content.json');
        $json_array = json_decode($json_string, true);
        $loadData = $json_array["page-index"];
        $arr= [
            "jumbotron" => [
                "title" => $loadData['jumbotron']['title'],
                "description" => $loadData['jumbotron']['description']
            ],
            "page_setup" => [
                "title-page" => $loadData["title-page"],
                "keywords-seo" => $loadData["keywords-seo"],
                "description-seo" => $loadData["description-seo"],
            ],
            "content-client-top" => $loadData['content-client-top'],
            "container-content-first" => [
                "title" => $loadData['container-content-first']['title'],
                "paragraph" => $loadData['container-content-first']['paragraph'],
                "description" => $loadData['container-content-first']['description'],
                "btn-link" => $loadData['container-content-first']['btn-link'],
                "figure" => [
                    "image_first" => $loadData['container-content-first']['figure']['image_first'],
                    "image_second" => $loadData['container-content-first']['figure']['image_second'],
                    "image_thirth" => $loadData['container-content-first']['figure']['image_thirth'],
                ]
            ],
            "container-content-second" => $loadData['container-content-second'],
            "container-content-thirth" => [
                "title" => $loadData['container-content-thirth']['title'],
                "description" => $loadData['container-content-thirth']['description'],
                "btn-link" => $loadData['container-content-thirth']['btn-link']
            ],
            "container-content-fourth" => [
                "title"=>$loadData['container-content-fourth']['title'],
                "img-client"=> $loadData['container-content-fourth']['img-client'],
            ]
        ];
        $this->form->fill($arr);
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make('Jumbotron')->schema([
                        TextInput::make('jumbotron.title'),
                        Textarea::make('jumbotron.description'),
                    ]),
                    Section::make('Page Setup')->schema([
                        TextInput::make('page_setup.title-page'),
                        TextInput::make('page_setup.keywords-seo'),
                        Textarea::make('page_setup.description-seo'),
                    ])->grow(false),
                ])->from('md'),
                Split::make([
                    FileUpload::make('content-client-top')->multiple()->required(),
                    Section::make('Container content first')->schema([
                        TextInput::make('container-content-first.title'),
                        TextInput::make('container-content-first.paragraph'),
                        Textarea::make('container-content-first.description'),
                        TextInput::make('container-content-first.btn-link'),
                        FileUpload::make('container-content-first.figure.image_first'),
                        FileUpload::make('container-content-first.figure.image_second'),
                        FileUpload::make('container-content-first.figure.image_thirth'),
                    ]),
                ]),
                Split::make([
                    Section::make('Container content second')->schema([
                        Repeater::make('container-content-second')->schema([
                            TextInput::make('title'),
                            TextInput::make('description'),
                            FileUpload::make('svg'),
                        ])
                    ]),
                    Section::make('Container content thirth')->schema([
                        TextInput::make('container-content-thirth.title'),
                        Textarea::make('container-content-thirth.description'),
                        TextInput::make('container-content-thirth.btn-link'),
                    ]),
                ]),
                Section::make('Container content fourth')->schema([
                    TextInput::make('container-content-fourth.title'),
                    FileUpload::make('container-content-fourth.img-client')->multiple()
                ]),
            ])
            ->statePath('formData');
    }
    protected function submitActions(): array
    {
        return [
            Action::make('setupHomePage')
                ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('setupHomePage'),
        ];
    }
    public function submit(): void
    {
        $formData = $this->form->getState();
        $json_string = file_get_contents('../page-content.json');
        $json_array = json_decode($json_string, true);
        $json_array['page-index']["keywords-seo"]=$formData['page_setup']['keywords-seo'];
        $json_array['page-index']["description-seo"]=$formData['page_setup']['description-seo'];
        $json_array['page-index']["jumbotron"]['title']=$formData["jumbotron"]['title'];
        $json_array['page-index']["jumbotron"]['description']=$formData["jumbotron"]['description'];
        $json_array['page-index']["content-client-top"]=$formData["content-client-top"];
        $json_array['page-index']["container-content-first"]=$formData["container-content-first"];
        $json_array['page-index']["container-content-second"]=$formData["container-content-second"];
        $json_array['page-index']["container-content-thirth"]=$formData["container-content-thirth"];
        $json_array['page-index']["container-content-fourth"]=$formData["container-content-fourth"];
        $newJsonString = json_encode($json_array);
        file_put_contents('../page-content.json', $newJsonString);
        Notification::make()
            ->title('Saved successfully')
            ->duration(10000)
            ->success()
            ->send();
    }
}
