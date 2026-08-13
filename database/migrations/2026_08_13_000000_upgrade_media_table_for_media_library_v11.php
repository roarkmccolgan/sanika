<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('media', function (Blueprint $table): void {
            $table->uuid('uuid')->nullable()->unique()->after('id');
            $table->string('conversions_disk')->nullable()->after('disk');
            $table->json('generated_conversions')->nullable()->after('manipulations');
        });

        DB::table('media')->orderBy('id')->chunkById(100, function ($media): void {
            foreach ($media as $item) {
                $customProperties = json_decode($item->custom_properties ?: '{}', true) ?: [];

                DB::table('media')->where('id', $item->id)->update([
                    'uuid' => (string) Str::uuid(),
                    'conversions_disk' => $item->disk,
                    'generated_conversions' => json_encode($customProperties['generated_conversions'] ?? []),
                ]);
            }
        });
    }

    public function down(): void
    {
        Schema::table('media', function (Blueprint $table): void {
            $table->dropUnique(['uuid']);
            $table->dropColumn(['uuid', 'conversions_disk', 'generated_conversions']);
        });
    }
};
