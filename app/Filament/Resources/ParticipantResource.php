<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParticipantResource\Pages;
use App\Filament\Resources\ParticipantResource\RelationManagers;
use App\Models\Participant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class ParticipantResource extends Resource
{
    protected static ?string $model = Participant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('runner')
                    ->label('Runner Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('bib-number')
                    ->required()
                    ->maxLength(255)
                    ->label('Bib Number')
                    ->default(fn() => self::generateNextEventNumber()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('runner')
                    ->label('Runner Name'),
                TextColumn::make('bib-number')
                    ->label('Bib Number'),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Action::make('qr_code')
                    ->label('Tampilkan QR Code')
                    ->icon('heroicon-o-qr-code')
                    ->modalHeading(fn (Participant $record) => 'QR Code - ' . $record->runner)
                    ->modalContent(fn (Participant $record) => view('filament.qr-modal', ['participant' => $record]))
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Tutup'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListParticipants::route('/'),
            'create' => Pages\CreateParticipant::route('/create'),
            'edit' => Pages\EditParticipant::route('/{record}/edit'),
        ];
    }

    public static function generateNextEventNumber(): string
    {
        $lastParticipant = Participant::where('bib-number', 'LIKE', 'EV%')
        ->orderBy('bib-number', 'desc')
        ->first();

        if (!$lastParticipant) {
        return 'EV0001';
    }

    $numericPart = (int) substr($lastParticipant->{"bib-number"}, 2);
    $nextNumber = $numericPart + 1;

        return 'EV' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
}
