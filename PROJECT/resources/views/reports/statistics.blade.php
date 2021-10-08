@push('css')
<style>
    .card-statistic h4{
        font-size: 36px;
        font-weight: bold;
    }
    .card-statistic p{
        font-style: italic;
    }
</style>
@endpush

<div>
    <!-- date filters -->
    <div class="mb-3">
        <form class="row">
            <div class="col-md-4">
                <label for="startDate">Start Date</label>
                <input name="startDate" id="startDate" type="date" value="{{ request()->get('startDate') }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="endDate">End Date</label>
                <input name="endDate" id="endDate" type="date" value="{{ request()->get('endDate') }}" class="form-control">
            </div>
            <div class="col-md-2">
                <label></label>
                <div>
                    <button class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>

    <hr>

    <div class="row">
        <!-- total order -->
        <div class="col-md-4 mb-3">
            <div class="card bg-primary card-statistic">
                <div class="card-body text-center text-white">
                <h4>{{ number_format($datas['totalOrder'], 0, null, ".") }}</h4>
                    <p>Total Order</p>
                </div>
            </div>
        </div>
        <!-- total item -->
        <div class="col-md-4 mb-3">
            <div class="card bg-success card-statistic">
                <div class="card-body text-center text-white">
                <h4>{{ number_format($datas['totalItem'], 0, null, ".") }}</h4>
                    <p>Total Item</p>
                </div>
            </div>
        </div>
        <!-- total qty -->
        <div class="col-md-4 mb-3">
            <div class="card bg-warning card-statistic">
                <div class="card-body text-center">
                <h4>{{ number_format($datas['totalQty'], 0, null, ".") }}</h4>
                    <p>Total Qty</p>
                </div>
            </div>
        </div>
        <!-- total ongkir -->
        <div class="col-md-4 mb-3">
            <div class="card bg-success card-statistic">
                <div class="card-body text-center text-white">
                <h4>{{ number_format($datas['totalShipment'], 0, null, ".") }}</h4>
                    <p>Total Shipment</p>
                </div>
            </div>
        </div>
        <!-- total discount -->
        <div class="col-md-4 mb-3">
            <div class="card bg-warning card-statistic">
                <div class="card-body text-center">
                    <h4>{{ number_format($datas['totalDiscount'], 0, null, ".") }}</h4>
                    <p>Total Discount</p>
                </div>
            </div>
        </div>
        <!-- total payment -->
        <div class="col-md-4 mb-3">
            <div class="card bg-primary card-statistic">
                <div class="card-body text-center text-white">
                <h4>{{ number_format($datas['totalPayment'], 0, null, ".") }}</h4>
                    <p>Total Payment</p>
                </div>
            </div>
        </div>
    </div>
</div>
