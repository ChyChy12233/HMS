-- Chạy: mysql -u root hotel < sql/migration_new_tables.sql
-- Tạo 5 bảng mới cho hotel DB. Không xóa hoặc sửa bảng cũ.

-- Service catalog (giặt ủi, ăn sáng, spa, v.v.)
CREATE TABLE IF NOT EXISTS service (
  ServiceId   varchar(10) NOT NULL PRIMARY KEY,
  ServiceName varchar(255) NOT NULL,
  Price       decimal(10,2) NOT NULL,
  Unit        varchar(50) DEFAULT 'lần',
  Note        varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Sử dụng dịch vụ theo từng lượt thuê phòng (room_customer)
CREATE TABLE IF NOT EXISTS service_usage (
  ServiceUsageId varchar(10) NOT NULL PRIMARY KEY,
  RoomCustomerId varchar(10) DEFAULT NULL,
  ServiceId      varchar(10) DEFAULT NULL,
  Quantity       int(11) DEFAULT 1,
  UsedAt         datetime DEFAULT current_timestamp(),
  TotalPrice     decimal(10,2) DEFAULT NULL,
  Note           varchar(255) DEFAULT NULL,
  FOREIGN KEY (RoomCustomerId) REFERENCES room_customer(RoomCustomerId),
  FOREIGN KEY (ServiceId)      REFERENCES service(ServiceId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cơ sở vật chất theo phòng (TV, điều hòa, minibar, v.v.)
CREATE TABLE IF NOT EXISTS facility (
  FacilityId   varchar(10) NOT NULL PRIMARY KEY,
  FacilityName varchar(255) NOT NULL,
  RoomId       varchar(10) DEFAULT NULL,
  Status       varchar(50) DEFAULT 'Hoạt động',
  Quantity     int(11) DEFAULT 1,
  Note         varchar(255) DEFAULT NULL,
  FOREIGN KEY (RoomId) REFERENCES room(RoomId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Báo cáo sự cố
CREATE TABLE IF NOT EXISTS incident (
  IncidentId   varchar(10) NOT NULL PRIMARY KEY,
  RoomId       varchar(10) DEFAULT NULL,
  ReportedBy   varchar(10) DEFAULT NULL,
  Title        varchar(255) NOT NULL,
  Description  text DEFAULT NULL,
  Severity     varchar(50) DEFAULT 'Trung bình',
  Status       varchar(50) DEFAULT 'Mới',
  ReportedAt   datetime DEFAULT current_timestamp(),
  ResolvedAt   datetime DEFAULT NULL,
  FOREIGN KEY (RoomId)     REFERENCES room(RoomId),
  FOREIGN KEY (ReportedBy) REFERENCES staff(StaffId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Chi tiết hóa đơn (room charge + service line items)
CREATE TABLE IF NOT EXISTS invoice_detail (
  InvoiceDetailId varchar(10) NOT NULL PRIMARY KEY,
  InvoiceId       varchar(10) DEFAULT NULL,
  ItemType        varchar(50) DEFAULT NULL,
  ItemName        varchar(255) DEFAULT NULL,
  Quantity        int(11) DEFAULT 1,
  UnitPrice       decimal(10,2) DEFAULT NULL,
  LineTotal       decimal(10,2) DEFAULT NULL,
  FOREIGN KEY (InvoiceId) REFERENCES invoice(InvoiceId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
