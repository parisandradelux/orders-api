<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\ExternalApiService;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct(private Order $order)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(ExternalApiService $externalApiService): void
    {
        try {

            $title = $externalApiService->fetchData();

            $this->order->update([
                'status' => 'processed',
                'external_data' => $title,
            ]);

        } catch (\Exception $e) {

            Log::error("Error procesando pedido #{$this->order->id}: {$e->getMessage()}");

            $this->order->update([
                'status' => 'failed',
            ]);
        }
    }
}
