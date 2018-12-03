{!! Form::select('client_id', $client , null, ['placeholder' => 'Select a Client...', 'class'=>'form-control', 'name'=>'client_id', 'id'=>'client_id'])!!}


{!! Form::select('sales_person_id', $employee , null, ['placeholder' => 'Select a Employee...', 'class'=>'form-control', 'name'=>'sales_person_id', 'id'=>'sales_person_id'])!!}


{!! Form::select('w_id', $warehouse , null, ['placeholder' => 'Select a Warehouse...', 'class'=>'form-control', 'name'=>'w_id', 'id'=>'w_id'])!!}

{!! Form::select('company_id', $company , null, ['placeholder' => 'Select a Company...', 'class'=>'form-control', 'name'=>'company_id', 'id'=>'company_id'])!!}


	//Insert

{!! Form::select('client_id', $client , null, ['placeholder' => 'Select a Client...', 'class'=>'form-control', 'name'=>'client_id'])!!}


{!! Form::select('sales_person_id', $employee , null, ['placeholder' => 'Select a Employee...', 'class'=>'form-control', 'name'=>'sales_person_id'])!!}


{!! Form::select('w_id', $warehouse , null, ['placeholder' => 'Select a Warehouse...', 'class'=>'form-control', 'name'=>'w_id'])!!}

{!! Form::select('company_id', $company , null, ['placeholder' => 'Select a Company...', 'class'=>'form-control', 'name'=>'company_id'])!!}



<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('logo.png', 0.3, true)
                        ->size(200)->errorCorrection('H')
                        ->generate({{ $id }})) !!} ">




$uProduct;
        $uProduct->name = $request->input('name');
        $uProduct->company = $request->input('company');
        $uProduct->quantity = $request->input('quantity');
        $uProduct->type = $request->input('type');
        $uProduct->price = $request->input('price');
        $uProduct->qrcode = $lastId;
        $uProduct->description = $request->input('description');
        $uProduct->packing = $request->input('packing');
        $newProducs->update()


        {{-- <td><img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(150)->errorCorrection('L')->generate($product->qrcode? $product->qrcode: "empty" )) }}">
                                    </td> --}}

public  function generate($id)
    {
        $product = Product::find($id);
        $p_id = $product->p_id;
        $en_id = encrypt($p_id);
        return 'data:image/png;base64,' . DNS1D::getBarcodePNG($en_id, 'C39+');
        // return "data:image/png;base64, {{ base64_encode(QrCode::format('png')->merge('logo.png', 0.3, true)->size(200)->errorCorrection('H')->generate($id)) }};";
    }