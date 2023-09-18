<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Auth;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $id = auth()->user()->id;
        return $form
            ->schema([
                //TextInput::make('note')->required()->unique(ignorable: fn($record) => $record),
                TextInput::make('note')->required(),
                TextInput::make('bulan')->required(),
                TextInput::make('nama_klient')->required(),
                DatePicker::make('tgl_awal_payment')->date("dd-MM-yyyy"),
                TextInput::make('durasi_waktu_pre'),
                DatePicker::make('tgl_start_iklan'),
                TextInput::make('nama_bisnis'),
                TextInput::make('platform_marketing'),
                TextInput::make('closing_from'),
                TextInput::make('ttd_mou'),
                DatePicker::make('tgl_ttdmou'),
                DatePicker::make('pembayaran'),
                TextInput::make('draft_copywriting_lp'),
                DatePicker::make('tgl_draft_copywriting_lp'),
                TextInput::make('pembuatan_seles_funnel'),
                DatePicker::make('tgl_buat_seles'),
                TextInput::make('link_piching'),
                TextInput::make('pembuatan_akun_iklan'),
                TextInput::make('review_perform_ads'),
                DatePicker::make('tgl_review_perform_ads'),
                DatePicker::make('tgl_review_klient'),
                TextInput::make('bahancontent'),
                TextInput::make('daily_report'),
                Hidden::make('users_id')->default($id),
            ]);
    }

    public static function table(Table $table): Table
    {
        TextColumn::configureUsing(function (TextColumn $column): void {
            $column
                ->searchable();
        });
        return $table
            ->columns([
                TextColumn::make('note'),
                TextColumn::make('bulan'),
                TextColumn::make('nama_klient'),
                TextColumn::make('tgl_awal_payment')->toggleable(),
                TextColumn::make('durasi_waktu_pre')->toggleable(),
                TextColumn::make('tgl_start_iklan')->toggleable(),
                TextColumn::make('platform_marketing')->toggleable(),
                TextColumn::make('closing_from')->toggleable(),
                TextColumn::make('ttd_mou')->toggleable(),
                TextColumn::make('tgl_ttdmou')->toggleable(),
                TextColumn::make('pembayaran')->toggleable(),
                TextColumn::make('draft_copywriting_lp')->toggleable(),
                TextColumn::make('tgl_draft_copywriting_lp')->toggleable(),
                TextColumn::make('pembuatan_sales_funnel')->toggleable(),
                TextColumn::make('tgl_buat_seles')->toggleable(),
                TextColumn::make('link_pitching')->toggleable(),
                TextColumn::make('pembuatan_akun_iklan')->toggleable(),
                TextColumn::make('review_perform_ads')->toggleable(),
                TextColumn::make('tgl_review_perform_ads')->toggleable(),
                TextColumn::make('tgl_review_klient')->toggleable(),
                TextColumn::make('bahan_content')->toggleable(),
                TextColumn::make('daily_report')->toggleable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery() : Builder{
        $id = $id = auth()->user()->id;
        $role = auth()->user()->roles[0]->name;
        if($role == "Admin")
        {
            return parent::getEloquentQuery();
        }else{
            return parent::getEloquentQuery()->where('users_id','=',$id);
        }

        
    }
}