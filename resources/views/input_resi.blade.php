@extends('layouts.master')
@section('master')
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-body">
                            <br/>

                            {{-- menampilkan error validasi --}}
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <br/>
                             <!-- form validasi -->
                            <form action="{{route('prosesresi')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="resi">Resi</label>
                                    <input class="form-control" type="text" name="resi" value="{{ old('resi') }}">
                                </div>
                                <div class="form-group">
                                    <label for="kurir">Kurir</label>
                                    <select class="form-control"  name="kurir" value="{{ old('kurir') }}">
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS</option>
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Proses">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
   

        @endsection