object Form1: TForm1
  Left = 0
  Top = 0
  Caption = 'Form1'
  ClientHeight = 314
  ClientWidth = 812
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  PixelsPerInch = 96
  TextHeight = 13
  object LblTemp: TLabel
    Left = 83
    Top = 90
    Width = 3
    Height = 13
  end
  object LblCommande: TLabel
    Left = 8
    Top = 8
    Width = 74
    Height = 13
    Caption = 'Consigne en C'#176
  end
  object Label1: TLabel
    Left = 8
    Top = 90
    Width = 69
    Height = 13
    Caption = 'Temp'#233'rature :'
  end
  object BtnStart: TButton
    Left = 640
    Top = 16
    Width = 159
    Height = 57
    Caption = 'D'#233'marrer la Chauffe'
    TabOrder = 0
    OnClick = BtnStartClick
  end
  object BtnArret: TButton
    Left = 640
    Top = 90
    Width = 159
    Height = 55
    Caption = 'Stopper la Chauffe'
    TabOrder = 1
    OnClick = BtnArretClick
  end
  object EditTemp: TEdit
    Left = 8
    Top = 34
    Width = 74
    Height = 21
    TabOrder = 2
  end
  object GraphTemp: TChart
    Left = 176
    Top = 34
    Width = 400
    Height = 250
    Title.Text.Strings = (
      'TChart')
    BottomAxis.Increment = 1.000000000000000000
    BottomAxis.Title.Caption = 'Secondes (s)'
    LeftAxis.Title.Caption = 'Temperature '#176'C'
    SeriesGroups = <
      item
        Name = 'Graph1'
      end>
    View3D = False
    TabOrder = 3
    DefaultCanvas = 'TGDIPlusCanvas'
    PrintMargins = (
      15
      19
      15
      19)
    ColorPaletteIndex = 13
    object Series1: TFastLineSeries
      Marks.Brush.Gradient.Colors = <
        item
          Color = clRed
        end
        item
          Color = 819443
          Offset = 0.067915690866510540
        end
        item
          Color = clYellow
          Offset = 1.000000000000000000
        end>
      Marks.Brush.Gradient.Direction = gdTopBottom
      Marks.Brush.Gradient.EndColor = clYellow
      Marks.Brush.Gradient.MidColor = 819443
      Marks.Brush.Gradient.StartColor = clRed
      Marks.Brush.Gradient.Visible = True
      Marks.Font.Color = 159
      Marks.Font.Name = 'Tahoma'
      Marks.Font.Style = [fsBold, fsItalic]
      Marks.Frame.Color = 33023
      Marks.RoundSize = 14
      Marks.Callout.Length = 20
      SeriesColor = clRed
      Title = 'Graph'
      LinePen.Color = clRed
      XValues.Name = 'X'
      XValues.Order = loAscending
      YValues.Name = 'Y'
      YValues.Order = loNone
      object TeeFunction1: TAddTeeFunction
        CalcByValue = False
      end
    end
  end
  object Timer1: TTimer
    Enabled = False
    OnTimer = Timer1Timer
    Left = 680
    Top = 176
  end
  object Timer2: TTimer
    Enabled = False
    Interval = 3000
    OnTimer = Timer2Timer
    Left = 744
    Top = 176
  end
end
