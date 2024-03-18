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

class SettingAbout extends Page
{
    protected static ?string $navigationLabel = 'About Page';
    protected static ?string $navigationGroup = 'Site Settings';
    protected static string $view = 'filament.pages.site-setup.setting-about';
    public ?array $formData = [];
    public function mount(): void
    {
        $json_string = file_get_contents('../page-content.json');
        $json_array = json_decode($json_string, true);
        $loadData = $json_array["page-about"];
        $arr= [
            "gallery" => $loadData['gallery'],
            "page_setup" => [
                "title-page" => $loadData['title-page'],
                "keywords-seo" => $loadData['keywords-seo'],
                "description-seo" => $loadData['description-seo']
            ],
            "feature" => $loadData['feature'],
            "info" => $loadData['info']
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
                        Textarea::make('gallery.description'),
                        FileUpload::make('gallery.image')->multiple(),
                    ]),
                    Section::make('Page Setup')->schema([
                        TextInput::make('page_setup.title-page'),
                        TextInput::make('page_setup.keywords-seo'),
                        Textarea::make('page_setup.description-seo'),
                    ])->grow(false),
                ])->from('md'),
                Split::make([
                    Section::make('Feature')->schema([
                        Repeater::make('feature')->schema([
                            TextInput::make('title'),
                            TextInput::make('value'),
                        ]),
                    Section::make('info')->schema([
                            TextInput::make('info.col-1'),
                            RichEditor::make('info.col-2'),
                        ]),
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
        $json_array['page-about']["title-page"]=$formData['page_setup']['title-page'];
        $json_array['page-about']["keywords-seo"]=$formData['page_setup']['keywords-seo'];
        $json_array['page-about']["description-seo"]=$formData['page_setup']['description-seo'];
        $json_array['page-about']["gallery"]=$formData["gallery"];
        $json_array['page-about']["feature"]=$formData["feature"];
        $json_array['page-about']["info"]=$formData["info"];
        $newJsonString = json_encode($json_array);
        file_put_contents('../page-content.json', $newJsonString);
        Notification::make()
            ->title('Saved successfully')
            ->duration(10000)
            ->success()
            ->send();
    }
}
