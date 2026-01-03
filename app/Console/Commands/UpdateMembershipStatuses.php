<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SchoolMembership;

class UpdateMembershipStatuses extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'memberships:update-statuses';

    /**
     * The console command description.
     */
    protected $description = 'Mark active memberships as expired when their end date has passed.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $now = now();

        // Only memberships that are:
        // - currently marked ACTIVE
        // - have an ends_at date
        // - and ends_at is in the past
        $query = SchoolMembership::where('status', SchoolMembership::STATUS_ACTIVE)
            ->whereNotNull('ends_at')
            ->where('ends_at', '<', $now);

        $count = $query->count();

        $this->info("Found {$count} membership(s) to expire.");

        if ($count === 0) {
            return Command::SUCCESS;
        }

        $updated = $query->update([
            'status' => SchoolMembership::STATUS_EXPIRED,
        ]);

        $this->info("Updated {$updated} membership(s) to status=expired.");

        return Command::SUCCESS;
    }
}
