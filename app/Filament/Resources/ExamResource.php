<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExamResource\Pages;
use App\Filament\Resources\ExamResource\RelationManagers;
use App\Filament\Resources\ExamResource\RelationManagers\QuestionsRelationManager;
use App\Models\Exam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExamResource extends Resource
{
    protected static ?string $model = Exam::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Exam Master';

    public static  ?string $label = 'Exams';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Exam Name')
                    ->live()
                    ->afterStateUpdated(function (\Filament\Forms\Set $set, $state) {
                        $set('slug', \Illuminate\Support\Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->readOnly()
                    ->unique(Exam::class, 'slug', fn ($record) => $record),
                Forms\Components\Select::make('course_id')
                    ->relationship(name: 'course', titleAttribute: 'name')
                    ->searchable()
                    ->required()
                    ->placeholder('Select an Course')
                    ->preload(),
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('passing_mark')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('maximum_mark')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending'  => 'Pending',
                        'active'   => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('start_date')
                    ->required()
                    ->native(false),
                Forms\Components\DatePicker::make('end_date')
                    ->required()
                    ->native(false),
                Forms\Components\RichEditor::make('description')
                    ->maxLength(65535)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('course.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration (In Min)')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('passing_mark')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('maximum_mark')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => \Illuminate\Support\Str::ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'pending'   => 'warning',
                        'active'    => 'success',
                        'inactive'  => 'danger',
                    }),
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
            QuestionsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExams::route('/'),
            'create' => Pages\CreateExam::route('/create'),
            'edit' => Pages\EditExam::route('/{record}/edit'),
        ];
    }
}
