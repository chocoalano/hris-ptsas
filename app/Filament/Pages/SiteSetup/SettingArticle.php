<?php

namespace App\Filament\Pages\SiteSetup;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SettingArticle extends Page
{
    protected static ?string $navigationLabel = 'Article Page';
    protected static ?string $navigationGroup = 'Site Settings';
    protected static string $view = 'filament.pages.site-setup.setting-article';
    public ?array $formData = [];
    public function mount(): void
    {
        $json_string = file_get_contents('../page-content.json');
        $json_array = json_decode($json_string, true);
        $loadData = $json_array["page-article"];
        $arr= [
            "jumbotron" => [
                "title"=> $loadData["jumbotron"]["title"],
                "description"=> $loadData["jumbotron"]["description"],
            ],
            "page_setup" => [
                "title-page" => $loadData['title-page'],
                "keywords-seo" => $loadData['keywords-seo'],
                "description-seo" => $loadData['description-seo']
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
        $json_array['page-article']["title-page"]=$formData['page_setup']['title-page'];
        $json_array['page-article']["keywords-seo"]=$formData['page_setup']['keywords-seo'];
        $json_array['page-article']["description-seo"]=$formData['page_setup']['description-seo'];
        $json_array['page-article']["jumbotron"]=$formData["jumbotron"];
        $newJsonString = json_encode($json_array);
        file_put_contents('../page-content.json', $newJsonString);
        Notification::make()
            ->title('Saved successfully')
            ->duration(10000)
            ->success()
            ->send();
    }
}
