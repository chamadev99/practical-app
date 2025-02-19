<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDeliveryRequest;

/**
 * @OA\Info(
 *      title="API Documentation",
 *      version="1.0.0",
 *      description="This is the API documentation for practical assignment application.",
 *      @OA\Contact(
 *          email="chamathpk1991@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 */

class DeliveryController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/all-delivery-list",
     *     summary="show all delivery list",
     *     tags={"all-delivery-list"},
     *     description="Show all delivery lists.",
     *     @OA\Response(
     *         response=200,
     *         description="all-delivery-list",
     *           @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="string", example="list")
     *         )
     *     ),
     *  @OA\Response(
     *         response=500,
     *         description="Failed to fetch delivery list",
     *           @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Failed to fetch delivery list"),
     *             @OA\Property(property="error", type="string", example="error message")
     *         )
     *     ),
     *
     * )
     */
    public function index()
    {
        try {
            $deliveries = Delivery::all();
            return response()->json([
                'success' => true,
                'data' => $deliveries
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch delivery list',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/add-delivery",
     *     summary="Create a new delivery request",
     *     description="Stores a new delivery request in the system",
     *     operationId="storeDelivery",
     *     tags={"Delivery"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"pickup_address", "pickup_name", "pickup_contact_no", "delivery_address", "delivery_name", "delivery_contact_no", "type_of_goods", "deliver_provider", "priority", "shipment_pickup_date", "shipment_pickup_time", "description", "length", "height", "width", "weight"},
     *             @OA\Property(property="pickup_address", type="string", example="123 Main St"),
     *             @OA\Property(property="pickup_name", type="string", example="John Doe"),
     *             @OA\Property(property="pickup_contact_no", type="string", example="123456789"),
     *             @OA\Property(property="delivery_address", type="string", example="456 Elm St"),
     *             @OA\Property(property="delivery_name", type="string", example="Jane Smith"),
     *             @OA\Property(property="delivery_contact_no", type="string", example="987654321"),
     *             @OA\Property(property="type_of_goods", type="string", example="Parcel"),
     *             @OA\Property(property="deliver_provider", type="string", example="DHL"),
     *             @OA\Property(property="priority", type="string", example="Standard"),
     *             @OA\Property(property="shipment_pickup_date", type="string", format="date", example="2024-12-05"),
     *             @OA\Property(property="shipment_pickup_time", type="string", example="10:05"),
     *             @OA\Property(property="description", type="string", example="Electronics"),
     *             @OA\Property(property="length", type="integer", example=150),
     *             @OA\Property(property="height", type="integer", example=150),
     *             @OA\Property(property="width", type="integer", example=150),
     *             @OA\Property(property="weight", type="integer", example=150)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Delivery request successfully created",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Delivery request has been successfully created"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="pickup_address", type="string", example="123 Main St"),
     *                 @OA\Property(property="pickup_name", type="string", example="John Doe"),
     *                 @OA\Property(property="pickup_contact_no", type="string", example="123456789"),
     *                 @OA\Property(property="delivery_address", type="string", example="456 Elm St"),
     *                 @OA\Property(property="delivery_name", type="string", example="Jane Smith"),
     *                 @OA\Property(property="delivery_contact_no", type="string", example="987654321"),
     *                 @OA\Property(property="type_of_goods", type="string", example="Parcel"),
     *                 @OA\Property(property="deliver_provider", type="string", example="DHL"),
     *                 @OA\Property(property="priority", type="string", example="Standard"),
     *                 @OA\Property(property="shipment_pickup_date", type="string", format="date", example="2024-12-05"),
     *                 @OA\Property(property="shipment_pickup_time", type="string", example="10:05"),
     *                 @OA\Property(property="description", type="string", example="Electronics"),
     *                 @OA\Property(property="length", type="integer", example=150),
     *                 @OA\Property(property="height", type="integer", example=150),
     *                 @OA\Property(property="width", type="integer", example=150),
     *                 @OA\Property(property="weight", type="integer", example=150),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-12-05T10:00:00Z"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-12-05T10:00:00Z")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to create delivery request",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Failed to create delivery request"),
     *             @OA\Property(property="error", type="string", example="Internal Server Error")
     *         )
     *     )
     * )
     */
    public function store(StoreDeliveryRequest $request)
    {
        try {
            $delivery = Delivery::create($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Delivery request has been successfully created',
                'data' => $delivery
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create delivery request',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($delivery)
    {
        try {

            $delivery = Delivery::find($delivery);
            $status = $delivery->status;
            if ($status == 'pending') {
                $delivery->status = 'cancel';
                $delivery->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Delivery item has been successfully cancelled',
                    'data' => $delivery
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Delivery item has been already shipped or completed',
                    'data' => $delivery
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch delivery list',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $delivery) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
}
