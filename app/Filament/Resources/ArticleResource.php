<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    // protected static ?string $navigationIcon = 'heroicon-collection';
    
    protected static ?string $slug = 'articles';

    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextInput::make('author')
                    ->required(),
                Forms\Components\DatePicker::make('created_at')
                    ->required(),
                Forms\Components\TextInput::make('reading_time')
                    ->required(),
                Forms\Components\TextInput::make('tag')
                    ->required(),
                Forms\Components\TextInput::make('image_link')
                    ->required(),
                Forms\Components\TextInput::make('image_alt')
                    ->required(),
                Forms\Components\Textarea::make('content')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('author'),
                Tables\Columns\TextColumn::make('created_at'),
                Tables\Columns\TextColumn::make('reading_time'),
                Tables\Columns\TextColumn::make('tag'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
