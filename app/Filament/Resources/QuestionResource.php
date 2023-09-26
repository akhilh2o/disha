<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Exam Master';

    public static  ?string $label = 'Questions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Question')
                    ->description('Write an question for the exam')
                    ->schema([
                        Forms\Components\TextInput::make('text')
                            ->label('Question')
                            ->placeholder('Write an question')
                            ->required()
                            ->columnSpan('full'),
                        Forms\Components\Select::make('exam_id')
                            ->relationship(name: 'exam', titleAttribute: 'name')
                            ->searchable()
                            ->required()
                            ->placeholder('Select an Exam')
                            ->preload(),
                        Forms\Components\Select::make('type')
                            ->options([
                                'multiple_choice'  => 'Multiple Choice',
                                'eassy'            => 'Eassy',
                            ])
                            ->required()
                            ->hidden(),
                    ]),
                Forms\Components\Section::make('Add Answers')
                    ->description('Add atleast 4 answers')
                    ->schema([
                        Forms\Components\Repeater::make('answers')
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('text')
                                    ->label('Answer')
                                    ->placeholder('Write an answer')
                                    ->required(),
                                Forms\Components\Radio::make('is_correct')
                                    ->label('Is this answer is correct?')
                                    ->boolean()
                                    ->inline()
                                    ->default(false)
                            ])->grid(2)
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('text')
                    ->label('Question')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('exam.name')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
