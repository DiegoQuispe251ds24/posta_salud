# Pruebas unitarias del módulo Pacientes (Guía 03)

Fecha: 23/11/2026 · Responsable: Diego Quispe

| Caso | Resultado | Observación |
|------|-----------|-------------|
| CP01 | OK        | Muestra 10 pacientes por página, total 40 y enlace Siguiente » |
| CP02 | OK        | Filtra correctamente al buscar por DNI completo |
| CP03 | OK        | Filtra sin distinguir mayúsculas/minúsculas (ilike) |
| CP04 | OK        | Conserva ?buscar= en la URL al paginar (withQueryString) |
| CP05 | OK        | Muestra mensajes de error en español en los campos obligatorios |
| CP06 | OK        | Valida longitud de 8 dígitos y conserva los datos con old() |
| CP07 | OK        | Rechaza DNI duplicado con mensaje amable (RN01) |
| CP08 | OK        | Valida que la fecha de nacimiento no sea futura |
| CP09 | OK        | Valida que el celular tenga 9 dígitos y empiece con 9 |
| CP10 | OK        | Registra el paciente, redirige a la ficha con aviso verde y sube total a 41 |
| CP11 | OK        | Actualiza el celular sin marcar falso duplicado de DNI |
| CP12 | OK        | Impide actualizar con el DNI de otro paciente existente (RN01) |
| CP13 | OK        | Bloquea eliminación si tiene citas y muestra aviso rojo (RF07) |
| CP14 | OK        | Elimina paciente sin citas con confirmación y baja total a 40 (RF07) |
| CP15 | OK        | Devuelve página 404 para un ID inexistente |