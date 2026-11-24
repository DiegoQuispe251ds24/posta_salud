# Pruebas del módulo Personal médico (Guía 04)

Fecha: 24/11/2026 · Responsable: Diego Quispe

| Caso | Resultado | Observación |
|------|-----------|-------------|
| CP01 | OK        | Muestra 5 profesionales activos con etiqueta verde y n.° de citas |
| CP02 | OK        | Filtro Inactivos muestra 1 profesional y Todos muestra 6 |
| CP03 | OK        | Combina especialidad y búsqueda agrupando condiciones correctamente |
| CP04 | OK        | Muestra errores en español en campos obligatorios; cuenta opcional |
| CP05 | OK        | Valida colegiatura de 4 a 6 dígitos |
| CP06 | OK        | Rechaza DNI o colegiatura duplicados con mensaje en español (RN01) |
| CP07 | OK        | Rechaza especialidad alterada en F12 mediante Rule::in |
| CP08 | OK        | Registra profesional con medico2@posta.test y sube activos a 6 |
| CP09 | OK        | Oculta cuentas ya vinculadas (whereDoesntHave) en el selector |
| CP10 | OK        | Permite editar especialidad sin falsos duplicados de DNI/colegiatura/cuenta |
| CP11 | OK        | Impide actualizar con la colegiatura de otro profesional (RN01) |
| CP12 | OK        | Desactiva a la Dra. Huamán informando citas próximas por reprogramar (RF09) |
| CP13 | OK        | Reactiva al profesional y actualiza su etiqueta a Activo (RF09) |
| CP14 | OK        | route:list --path=personal-medico confirma ausencia de ruta DELETE |