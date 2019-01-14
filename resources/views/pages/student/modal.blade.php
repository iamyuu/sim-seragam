<div id="modal-upload" class="modal">
    <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
        <div class="modal-content"> @csrf
            <div class="file-field input-field">
                <div class="btn cyan">
                    <span>File</span>
                    <input type="file" name="file">
                </div>
                <div class="file-path-wrapper">
                    <input type="text" class="file-path">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-flat modal-action modal-close waves-effect waves-light">Batal</button>
            <button type="submit" class="btn-flat modal-action waves-effect waves-light">Simpan</button>
        </div>
    </form>
</div>

<div id="modal-add" class="modal">
    <form action="{{ route('siswa.store') }}" method="POST"> @csrf
        <div class="modal-content" style="margin-bottom: 50px;">
            <div class="input-field col s12">
                <input type="text" name="no_daftar" autocomplete="off" required>
                <label>No Daftar</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="nama_lengkap" autocomplete="off" required>
                <label>Nama Lengkap</label>
            </div>
            <div class="row">
                <span>&nbsp;&nbsp;&nbsp;Jenis Kelamin</span>
                <span>
                    <input type="radio" id="jk-1" name="jenis_kelamin" value="1" class="with-gap" required>
                    <label for="jk-1">Laki-laki</label>
                </span>
                <span>
                    <input type="radio" id="jk-2" name="jenis_kelamin" value="2" class="with-gap" required>
                    <label for="jk-2">Perempuan</label>
                </span>
            </div>
            <div class="row">
                <span>&nbsp;&nbsp;&nbsp;Agamm</span>
                <span>
                    <input type="radio" id="religion-1" name="agama" value="1" class="with-gap" required>
                    <label for="religion-1">Islam</label>
                </span>
                <span>
                    <input type="radio" id="religion-2" name="agama" value="2" class="with-gap" required>
                    <label for="religion-2">Kristen</label>
                </span>
                <span>
                    <input type="radio" id="religion-3" name="agama" value="2" class="with-gap" required>
                    <label for="religion-3">Katolik</label>
                </span>
                <span>
                    <input type="radio" id="religion-4" name="agama" value="2" class="with-gap" required>
                    <label for="religion-4">Hindu</label>
                </span>
                <span>
                    <input type="radio" id="religion-5" name="agama" value="2" class="with-gap" required>
                    <label for="religion-5">Budha</label>
                </span>
            </div>
            <div class="input-field col s12">
                <input type="text" name="asal_smp" autocomplete="off" required>
                <label>Asal SMP</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-flat modal-action modal-close waves-effect waves-light">Batal</button>
            <button type="submit" class="btn-flat modal-action waves-effect waves-light">Simpan</button>
        </div>
    </form>
</div>

<div id="modal-edit" class="modal">
    <form action="{{ route('siswa.update') }}" method="POST"> @csrf @method('PATCH')
        <div class="modal-content" style="margin-bottom: 50px;">
            <div class="input-field col s12">
                <input type="text" name="no_daftar" id="no_daftar" autocomplete="off" disabled autofocus required>
                <label>No Daftar</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="nama_lengkap" id="nama" autocomplete="off" autofocus required>
                <label>Nama Lengkap</label>
            </div>
            <div class="row">
                <span>&nbsp;&nbsp;&nbsp;Jenis Kelamin</span>
                <span>
                    <input type="radio" id="jk-edit-1" name="jenis_kelamin" value="1" class="with-gap" required>
                    <label for="jk-edit-1">Laki-laki</label>
                </span>
                <span>
                    <input type="radio" id="jk-edit-2" name="jenis_kelamin" value="2" class="with-gap" required>
                    <label for="jk-edit-2">Perempuan</label>
                </span>
            </div>
            <div class="row">
                <span>&nbsp;&nbsp;&nbsp;Agama</span>
                <span>
                    <input type="radio" id="religion-edit-1" name="agama" value="1" class="with-gap" required>
                    <label for="religion-edit-1">Islam</label>
                </span>
                <span>
                    <input type="radio" id="religion-edit-2" name="agama" value="2" class="with-gap" required>
                    <label for="religion-edit-2">Kristen</label>
                </span>
                <span>
                    <input type="radio" id="religion-edit-3" name="agama" value="2" class="with-gap" required>
                    <label for="religion-edit-3">Katolik</label>
                </span>
                <span>
                    <input type="radio" id="religion-edit-4" name="agama" value="2" class="with-gap" required>
                    <label for="religion-edit-4">Hindu</label>
                </span>
                <span>
                    <input type="radio" id="religion-edit-5" name="agama" value="2" class="with-gap" required>
                    <label for="religion-edit-5">Budha</label>
                </span>
            </div>
            <div class="input-field col s12">
                <input type="text" name="asal_smp" id="asal_smp" autocomplete="off" autofocus required>
                <label>Asal SMP</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-flat modal-action modal-close waves-effect waves-light">Batal</button>
            <button type="submit" class="btn-flat modal-action waves-effect waves-light">Simpan</button>
        </div>
    </form>
</div>