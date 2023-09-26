<?php

namespace App\Filament\Resources\ExamResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'questions';

    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('text')
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
