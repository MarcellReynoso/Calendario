<script>
    @auth // Verificar si el usuario está autenticado
        // Redirigir después de iniciar sesión
        window.location.href = "{{ route('evento') }}";
    @endauth
</script>
</body>
</html>