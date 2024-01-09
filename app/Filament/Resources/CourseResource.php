<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Category;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(function (\Filament\Forms\Set $set, $state) {
                        $set('slug', \Illuminate\Support\Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->readOnly(),
                Grid::make(3)
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending'  => 'Pending',
                                'active'   => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('price')
                            ->label('Price (Insider)')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('price_for_other')
                            ->label('Price (Outsider)')
                            ->required()
                            ->numeric(),
                    ]),
                Forms\Components\Textarea::make('short_description')
                    ->columnSpan('full'),
                Forms\Components\RichEditor::make('long_description')
                    ->maxLength(65535)
                    ->columnSpan('full'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->maxSize(1024)
                    ->imageEditor()
                    ->directory('course-thumbnails')
                    ->getUploadedFileNameForStorageUsing(
                        fn (\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                            ->prepend('course-' . time()),
                    )
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->extraImgAttributes(fn (Course $record): array => [
                        'alt'     => "{$record->name}",
                        'loading' => 'lazy'
                    ])
                    ->circular()
                    ->defaultImageUrl(asset('image/no-image-available.jpg')),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Course name copied')
                    ->copyMessageDuration(1500),
                Tables\Columns\TextColumn::make('price')
                    ->label('Price (Insider)')
                    ->searchable()
                    ->sortable()
                    ->money('inr'),
                Tables\Columns\TextColumn::make('price_for_other')
                    ->label('Price (Outsider)')
                    ->searchable()
                    ->sortable()
                    ->money('inr'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => \Illuminate\Support\Str::ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'pending'   => 'warning',
                        'active'    => 'success',
                        'inactive'  => 'danger',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'     => Pages\ListCourses::route('/'),
            'create'    => Pages\CreateCourse::route('/create'),
            'edit'      => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
