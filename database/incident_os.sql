INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `document_type`, `document_number`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
('019c99f8-86d4-7270-bd53-c27b7a090a19', 'Administrador', 'admin@example.com', '2026-02-26 16:42:07', '$2y$12$F/hthsvXND8/7Hhh13yCNOMMXLarNOAn0iSf./Jzd/xnh1y0Q2Uvm', 'venezolano', 12940582, NULL, NULL, '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-87f8-733c-8759-9ea323c751ec', 'Moderador', 'moderador@example.com', '2026-02-26 16:42:07', '$2y$12$tSHlLPIn6IBsN3isBLsomOKCtrAWXRylcXYKddEbzPov.L0SIi1Oe', 'venezolano', 20185920, NULL, NULL, '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-891a-73db-905e-bdf86b2e4367', 'Moderador2', 'moderador2@example.com', '2026-02-26 16:42:07', '$2y$12$veNqG2A5Gfh/1LxoyFFnoOnsk4nf9Rh8fDmDgbYWDJkKZSrR7vEIy', 'venezolano', 20185922, NULL, NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8a3b-7121-86a6-aa0c24394ed4', 'Empleado', 'empleado@example.com', '2026-02-26 16:42:08', '$2y$12$IdjjR7F07KKM2ELQCYgDre8LebRwk3c1BB9Patgcv8y9u4NV3DgXG', 'venezolano', 14959023, NULL, NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b5d-7093-85c8-d8ed617b70ab', 'Empleado2', 'empleado2@example.com', '2026-02-26 16:42:08', '$2y$12$6WKL0SGGvSfYy0MdQGBgcO3scJnWPpSnNUwd8m6cK.1MBc9t3A6UK', 'venezolano', 14959022, NULL, NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08');


INSERT INTO `departments` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
('019c99f8-8b66-7191-a8f1-5664eb518337', 'Tecnología IT', NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b68-70c8-b1a1-106b1b3dd3d7', 'Recursos Humanos', NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b6a-7202-a731-7059c792fe2e', 'Mantenimiento', NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b6c-72c1-9f68-a837148a7ebb', 'Operaciones', NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b6e-735f-829d-4ec3318e1460', 'Atención Cliente', NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08');


INSERT INTO `incidents` (`id`, `title`, `description`, `status`, `priority`, `attachments`, `user_id`, `department_id`, `closed_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
('019c99f8-8b73-7102-9aef-be62e3789b17', 'Fallo de conexión en red local', 'Esta es una descripción detallada para el reporte de Fallo de conexión en red local.', 'assigned', 'high', NULL, '019c99f8-8a3b-7121-86a6-aa0c24394ed4', '019c99f8-8b6e-735f-829d-4ec3318e1460', NULL, NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b75-73fa-b5f9-7360da8a9e84', 'Soporte para cambio de monitor', 'Esta es una descripción detallada para el reporte de Soporte para cambio de monitor.', 'assigned', 'medium', NULL, '019c99f8-87f8-733c-8759-9ea323c751ec', '019c99f8-8b6e-735f-829d-4ec3318e1460', NULL, NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b76-702c-8a65-d5e8ae07c69d', 'Error crítico al iniciar sesión', 'Esta es una descripción detallada para el reporte de Error crítico al iniciar sesión.', 'assigned', 'low', NULL, '019c99f8-86d4-7270-bd53-c27b7a090a19', '019c99f8-8b6c-72c1-9f68-a837148a7ebb', NULL, NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b78-70a5-9822-cf486a93cd1e', 'Configuración de nuevo correo', 'Esta es una descripción detallada para el reporte de Configuración de nuevo correo.', 'assigned', 'low', NULL, '019c99f8-86d4-7270-bd53-c27b7a090a19', '019c99f8-8b6a-7202-a731-7059c792fe2e', NULL, NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b79-70ab-859f-999da2f3f4ba', 'Reparación de aire acondicionado', 'Esta es una descripción detallada para el reporte de Reparación de aire acondicionado.', 'assigned', 'medium', NULL, '019c99f8-8a3b-7121-86a6-aa0c24394ed4', '019c99f8-8b6e-735f-829d-4ec3318e1460', NULL, NULL, '2026-02-26 16:42:08', '2026-02-26 16:42:08');


INSERT INTO `incident_updates` (`id`, `incident_id`, `user_id`, `comment`, `attachments`, `previous_status`, `new_status`, `created_at`, `updated_at`) VALUES
('019c99f8-8b7f-70ff-8f85-3f476c3d215d', '019c99f8-8b73-7102-9aef-be62e3789b17', '019c99f8-8a3b-7121-86a6-aa0c24394ed4', 'Se ha recibido la incidencia y se está analizando.', NULL, 'new', 'assigned', '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b83-72fc-a9be-f6fbc54665cf', '019c99f8-8b75-73fa-b5f9-7360da8a9e84', '019c99f8-87f8-733c-8759-9ea323c751ec', 'Se ha recibido la incidencia y se está analizando.', NULL, 'new', 'assigned', '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b85-707b-8f2b-dfd649cf5159', '019c99f8-8b76-702c-8a65-d5e8ae07c69d', '019c99f8-86d4-7270-bd53-c27b7a090a19', 'Se ha recibido la incidencia y se está analizando.', NULL, 'new', 'assigned', '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b88-73ce-8a66-f19bfba4ca87', '019c99f8-8b78-70a5-9822-cf486a93cd1e', '019c99f8-86d4-7270-bd53-c27b7a090a19', 'Se ha recibido la incidencia y se está analizando.', NULL, 'new', 'assigned', '2026-02-26 16:42:08', '2026-02-26 16:42:08'),
('019c99f8-8b8b-7316-823c-d7a5713161b2', '019c99f8-8b79-70ab-859f-999da2f3f4ba', '019c99f8-8a3b-7121-86a6-aa0c24394ed4', 'Se ha recibido la incidencia y se está analizando.', NULL, 'new', 'assigned', '2026-02-26 16:42:08', '2026-02-26 16:42:08');


INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
('019c99f8-852d-722e-87b0-8f46f590308d', 'view_any_user', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8535-720f-be37-29a51da1e82d', 'view_user', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8537-7233-a9b8-9569e57d4923', 'create_user', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-853a-7070-b346-16b92304ba10', 'update_user', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-853c-7330-ae54-cbad2218463f', 'delete_user', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-853f-7112-80c1-180feae6849b', 'restore_user', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8541-711c-b4fc-ca5bc7dd2f41', 'view_any_role', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8544-73b4-84a0-987956ad242c', 'view_role', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8546-73c7-b6c7-bf5b521ae122', 'view_any_activity_log', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8549-73e3-a9a4-941acac7217e', 'view_activity_log', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-854b-73f4-9096-3b6c19c9cea4', 'view_any_department', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-854e-72f3-9421-7071b7504b19', 'view_department', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8550-73ef-b10e-4929055f022a', 'create_department', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8553-7207-8f17-445f7ec173f7', 'update_department', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8555-7074-9e8c-42c5d4b7d9f3', 'delete_department', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8558-7369-b224-413419bc85c9', 'restore_department', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-855b-7369-b66f-0f2bffe1a486', 'view_any_incident', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-855e-7178-8767-d2c75ab13aaa', 'view_incident', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8560-71de-8e5b-6ee9dbff94c4', 'create_incident', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8563-73e6-bb8d-97186c5e168f', 'update_incident', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8565-7362-acbc-f48ab75a3228', 'delete_incident', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8568-7011-a47a-79c03bb2c629', 'restore_incident', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07');


INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
('019c99f8-856e-70f2-80ad-e681b288c585', 'super_admin', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-857f-710d-93ec-29e4283beec2', 'moderator', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07'),
('019c99f8-8597-7190-847f-7e53d2aff653', 'employee', 'web', '2026-02-26 16:42:07', '2026-02-26 16:42:07');


INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
('019c99f8-856e-70f2-80ad-e681b288c585', 'App\\Models\\User', '019c99f8-86d4-7270-bd53-c27b7a090a19'),
('019c99f8-857f-710d-93ec-29e4283beec2', 'App\\Models\\User', '019c99f8-87f8-733c-8759-9ea323c751ec'),
('019c99f8-857f-710d-93ec-29e4283beec2', 'App\\Models\\User', '019c99f8-891a-73db-905e-bdf86b2e4367'),
('019c99f8-8597-7190-847f-7e53d2aff653', 'App\\Models\\User', '019c99f8-8a3b-7121-86a6-aa0c24394ed4'),
('019c99f8-8597-7190-847f-7e53d2aff653', 'App\\Models\\User', '019c99f8-8b5d-7093-85c8-d8ed617b70ab');


INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
('019c99f8-852d-722e-87b0-8f46f590308d', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8535-720f-be37-29a51da1e82d', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8537-7233-a9b8-9569e57d4923', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-853a-7070-b346-16b92304ba10', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-853c-7330-ae54-cbad2218463f', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-853f-7112-80c1-180feae6849b', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8541-711c-b4fc-ca5bc7dd2f41', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8544-73b4-84a0-987956ad242c', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8546-73c7-b6c7-bf5b521ae122', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8549-73e3-a9a4-941acac7217e', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-854b-73f4-9096-3b6c19c9cea4', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-854e-72f3-9421-7071b7504b19', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8550-73ef-b10e-4929055f022a', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8553-7207-8f17-445f7ec173f7', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8555-7074-9e8c-42c5d4b7d9f3', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8558-7369-b224-413419bc85c9', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-855b-7369-b66f-0f2bffe1a486', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-855e-7178-8767-d2c75ab13aaa', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8563-73e6-bb8d-97186c5e168f', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8565-7362-acbc-f48ab75a3228', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-8568-7011-a47a-79c03bb2c629', '019c99f8-856e-70f2-80ad-e681b288c585'),
('019c99f8-854b-73f4-9096-3b6c19c9cea4', '019c99f8-857f-710d-93ec-29e4283beec2'),
('019c99f8-854e-72f3-9421-7071b7504b19', '019c99f8-857f-710d-93ec-29e4283beec2'),
('019c99f8-855b-7369-b66f-0f2bffe1a486', '019c99f8-857f-710d-93ec-29e4283beec2'),
('019c99f8-855e-7178-8767-d2c75ab13aaa', '019c99f8-857f-710d-93ec-29e4283beec2'),
('019c99f8-8563-73e6-bb8d-97186c5e168f', '019c99f8-857f-710d-93ec-29e4283beec2'),
('019c99f8-855b-7369-b66f-0f2bffe1a486', '019c99f8-8597-7190-847f-7e53d2aff653'),
('019c99f8-855e-7178-8767-d2c75ab13aaa', '019c99f8-8597-7190-847f-7e53d2aff653'),
('019c99f8-8560-71de-8e5b-6ee9dbff94c4', '019c99f8-8597-7190-847f-7e53d2aff653');


