@extends('admin.layouts.base')

@section('style-head')
    @include('admin.layouts.style')
@endsection

@section('script-head')
        @include('admin.layouts.script')
@endsection

@section('content')

    <div class="ui container">
        <a href="{{ route('admin.programKerja.create') }}" class="ui primary button">Buat Progran Kerja</a>
        <section class="section-audit-trails">
         <br />
        
            <div class="ui top attached menu">
                <div class="menu">
                    <div class="item borderless">
                        <h4>Daftar Program Kerja</h4>
                    </div>
                </div>
                <div class="right menu">
                    <div class="ui right aligned item">
                        <form method="GET" action="{{ route('admin.programKerja.index') }}">
                            <div class="ui transparent icon input">
                                <input class="prompt" name="nama" value="{{ request('search') }}" type="text" placeholder="Cari Program Kerja">
                                <i class="search link icon"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ui segment attached fitted">
                <table class="ui very compact table bottom small sortable">
                    <thead>
                    <tr>
                        <th ><button data-click-state="0" id="checkAll"><i class="check circle icon icon-button"></i></button></th>
                        <th>Nama Progran Kerja</th>
                        <th>Fase Sekarang</th>
                        <th>Pembuat</th>
                        <th>Satker</th>
                        <th>Dibuat Pada</th>


                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($programKerja as $data)
                        <tr>
                            <td><input class="deletedId" type="checkbox" value="{{ $data->present('id') }}" /></td>
                            <td>{{ $data->present('name') }}</td>
                            <td>{!! $data->present('fase_sekarang') !!}</td>
                            <td>{{ $data->present('creator_name') }}</td>
                            <td>{{ $data->present('satker_name') }}</td>
                            <td>{{ $data->present('date_for_human') }}</td>

                            

                            <td class="right aligned">
                                <a class="ui green button basic mini" href="{{ Route('admin.programKerja.edit', ['id' => $data->present('id')]) }}"><i class="large edit icon"></i></a> 
                                
                                <form role="form" action="{{ route('admin.programKerja.destroy',  [ 'id' => $data->present('id') ]) }}" method="POST" id="delete-form">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                </form>

                                <button class="ui red button basic mini delete-button"><i class="large remove icon"></i></button>
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="4" class="warning center aligned" style="font-size: 1.5rem;padding:40px;font-style: italic">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                  </tbody>
                  <tfoot>
                        <tr>
                            <td>
                                <button class="negative ui button" id="deleteMultiple">X</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="ui menu bottom attached">
                <div class="item borderless">
                    <small>{!! with(new \Laravolt\Support\Pagination\SemanticUiPagination($programKerja))->summary() !!}</small>
                </div>
                {!! with(new \Laravolt\Support\Pagination\SemanticUiPagination($programKerja))->render('attached bottom right') !!}
            </div>
        </section>
    </div>

    <div class="ui small test modal deleteConfirm">
      <div class="header">
        Hapus Program Kerja
      </div>
    <div class="content">
      <p>Apakah anda akan menghapus program kerja ini ?</p>
    </div>
    <div class="actions">
        <div class="ui negative button">
        Tidak
        </div>
        <div class="ui positive right labeled icon button yess-button">
          Ya
          <i class="checkmark icon"></i>
        </div>
      </div>
    </div>

    <div class="ui small test modal multipleDeleteConfirm">
      <div class="header">
        Hapus Beberapa Program Kerja
      </div>
    <div class="content">
      <p>Anda akan menghapus semua program kerja yang telah dicentang ?</p>
    </div>
    <div class="actions">
        <div class="ui negative button">
        Tidak
        </div>
        <div class="ui positive right labeled icon button yess2-button">
          Ya
          <i class="checkmark icon"></i>
        </div>
      </div>
    </div>

    <form method="post" action="{{ route('admin.programKerja.deleteMultiple') }}" role="form" id="multipleDeletedForm">
      {{ csrf_field() }}

    </form>



@endsection
