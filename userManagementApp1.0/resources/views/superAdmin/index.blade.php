@extends('layouts.app')

@section('content')
<div class="bg-secondary-subtle container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Panel de SuperAdmin</h1>

    <!-- Botón para abrir la modal de crear usuario -->
    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createUserModal">
        Crear Nuevo Usuario
    </button>

    <!-- Incluir las modales -->
    @include('modal.create')
    @include('modal.edit')

    <!-- Lista de Usuarios -->
    <div class="bg-warning-subtle shadow-md rounded-lg p-4">
        <h2 class="text-xl font-semibold mb-4">Usuarios registrados</h2>

        <table class="table table-dark table-striped-columns">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Verificado</th>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at ? 'SI' : 'NO' }}</td>
                    <td>{{ $user->role }}</td>
                    <td class="text-center">
                        <div class="flex justify-center space-x-2">


                            <!-- Botón para Editar -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal"
                                onclick="fillEditModal('{{ $user->id }}', '{{ addslashes($user->name) }}', '{{ addslashes($user->email) }}', '{{ addslashes($user->role) }}')">
                                Editar
                            </button>

                            <!-- Botón para Eliminar -->
                            @if ($user->role !== 'superAdmin')
                            <button onclick="deleteUser('{{ $user->id }}')" class="btn btn-danger">
                                Eliminar
                            </button>
                            @endif

                            @if (!$user->email_verified_at)
                            <button onclick="verifyUser('{{ $user->id }}')" class="btn btn-success">
                                Verificar
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>

<script>
    function verifyUser(userId) {
        if (confirm('¿Estás seguro de que quieres verificar este usuario?')) {
            fetch(`/superAdmin/verify/${userId}`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    console.log(response);
                    if (response.ok) {
                        alert('Usuario verificado correctamente.');
                        location.reload(); // Recarga la página para reflejar los cambios
                    } else {
                        alert('Hubo un problema al verificar el usuario.');
                    }
                })
                .catch(error => {
                    console.error('Error al verificar:', error);
                    alert('Error al intentar verificar el usuario.');
                });
        }
    }

    function fillEditModal(id, name, email, role) {
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-email').value = email;
        document.getElementById('edit-role').value = role;
        document.getElementById('edit-user-form').action = '/superAdmin/edit/' + id;
    }


    function deleteUser(userId) {
        if (confirm('¿Estás seguro de que quieres eliminar este usuario?')) {
            fetch(`/superAdmin/delete/${userId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        alert('Usuario eliminado con éxito.');
                        location.reload();
                    } else {
                        alert('Hubo un problema al eliminar el usuario.');
                    }
                })
                .catch(error => {
                    console.error('Error al eliminar:', error);
                    alert('Error al intentar eliminar el usuario.');
                });
        }
    }

    function fillEditModal(id, name, email, role) {
        // Habilitar/deshabilitar según el rol
        const roleField = document.getElementById('edit-role');
        const emailField = document.getElementById('edit-email');
        if (role === 'superAdmin') {
            roleField.disabled = true;
            emailField.readOnly = true;
        } else {
            roleField.disabled = false;
            emailField.readOnly = false;
        }

        // Actualizar campos del formulario
        document.getElementById('edit-name').value = name;
        emailField.value = email;
        roleField.value = role;

        // Configurar la acción del formulario
        document.getElementById('edit-user-form').action = `/superAdmin/edit/${id}`;
    }
</script>
@endsection