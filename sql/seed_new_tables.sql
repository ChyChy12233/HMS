-- Seed dữ liệu mẫu cho 5 bảng mới
-- Chạy SAU khi đã chạy migration_new_tables.sql
-- Chạy: mysql -u root hotel < sql/seed_new_tables.sql

-- ============================================================
-- 4 dịch vụ mẫu
-- ============================================================
INSERT IGNORE INTO service (ServiceId, ServiceName, Price, Unit, Note) VALUES
  ('SV001', 'Giặt ủi',          50000.00, 'lần',  NULL),
  ('SV002', 'Ăn sáng',          80000.00, 'lần',  'Buffet sáng tại nhà hàng'),
  ('SV003', 'Spa',             300000.00, 'lần',  'Đặt lịch trước 2 tiếng'),
  ('SV004', 'Đưa đón sân bay', 200000.00, 'lần',  'Phục vụ 24/7');

-- ============================================================
-- 6 cơ sở vật chất mẫu (gán cho các phòng R01, R955, R691, R804)
-- RoomId lấy từ bảng room hiện có
-- ============================================================
INSERT IGNORE INTO facility (FacilityId, FacilityName, RoomId, Status, Quantity, Note) VALUES
  ('FA001', 'TV 55 inch',       'R01',  'Hoạt động', 1, 'Smart TV Samsung'),
  ('FA002', 'Điều hòa',         'R01',  'Hoạt động', 1, 'Daikin 18000 BTU'),
  ('FA003', 'Minibar',          'R955', 'Hoạt động', 1, NULL),
  ('FA004', 'Wifi router',      'R955', 'Hoạt động', 1, 'Tốc độ 300Mbps'),
  ('FA005', 'Máy sấy tóc',      'R691', 'Hoạt động', 1, NULL),
  ('FA006', 'Bồn tắm jacuzzi',  'R804', 'Đang sửa',  1, 'Dự kiến sửa xong 20/05/2026');

-- ============================================================
-- 2 sự cố mẫu (1 đã xử lý, 1 đang xử lý)
-- RoomId và ReportedBy lấy từ bảng room và staff hiện có
-- ============================================================
INSERT IGNORE INTO incident
  (IncidentId, RoomId, ReportedBy, Title, Description, Severity, Status, ReportedAt, ResolvedAt)
VALUES
  ('IN001', 'R691', 'NV705',
   'Điều hòa không mát',
   'Khách phàn nàn điều hòa phòng 106 chạy nhưng không lạnh',
   'Trung bình', 'Đã xử lý',
   '2026-05-10 09:00:00', '2026-05-10 14:30:00'),

  ('IN002', 'R804', 'NV629',
   'Bồn tắm bị rò nước',
   'Phát hiện rò nước tại van bồn tắm jacuzzi phòng 702, đã tạm đóng van',
   'Cao', 'Đang xử lý',
   '2026-05-17 15:00:00', NULL);

-- ============================================================
-- service_usage và invoice_detail: để trống, sinh từ flow nghiệp vụ
-- ============================================================
