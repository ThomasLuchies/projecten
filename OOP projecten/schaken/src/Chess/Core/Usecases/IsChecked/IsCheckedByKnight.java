package Chess.Core.Usecases.IsChecked;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.Knight;
import Chess.Core.Usecases.LocateKing.LocateKing;

public class IsCheckedByKnight extends IsChecked
{
    @Override
    public boolean execute(Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var kingLocation = locateKing.locate(board, color);

        var aboveLeft = new Coords(kingLocation.x() - 1, kingLocation.y() + 2);
        var leftAbove = new Coords(kingLocation.x() - 2, kingLocation.y() + 1);
        var underLeft = new Coords(kingLocation.x() - 1, kingLocation.y() - 2);
        var leftUnder = new Coords(kingLocation.x() - 2, kingLocation.y() - 1);
        var aboveRight = new Coords(kingLocation.x() + 1, kingLocation.y() + 2);
        var rightAbove = new Coords(kingLocation.x() + 2, kingLocation.y() + 1);
        var underRight = new Coords(kingLocation.x() + 1, kingLocation.y() - 2);
        var rightUnder = new Coords(kingLocation.x() + 2, kingLocation.y() - 1);

        var checkedAboveLeft = checkedByKnight(board, color, aboveLeft);
        var checkedLeftAbove = checkedByKnight(board, color, leftAbove);
        var checkedUnderLeft = checkedByKnight(board, color, underLeft);
        var checkedLeftUnder = checkedByKnight(board, color, leftUnder);
        var checkedAboveRight = checkedByKnight(board, color, aboveRight);
        var checkedRightAbove = checkedByKnight(board, color, rightAbove);
        var checkedUnderRight = checkedByKnight(board, color, underRight);
        var checkedRightUnder = checkedByKnight(board, color, rightUnder);

        return checkedAboveLeft ||
                checkedLeftAbove ||
                checkedUnderLeft ||
                checkedLeftUnder ||
                checkedAboveRight ||
                checkedRightAbove ||
                checkedUnderRight ||
                checkedRightUnder;
    }

    private boolean checkedByKnight(Board board, Color color, Coords coords) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var beyondUpperBounds = coords.x() > 8;
        var beyondLowerBounds = coords.x() < 1;
        var beyondLeftBounds = coords.y() > 8;
        var beyondRightBounds = coords.y() < 1;
        if (beyondUpperBounds || beyondLowerBounds || beyondLeftBounds || beyondRightBounds)
            return false;

        if (!board.pieceOnField(coords))
            return false;
        var piece = board.getPiece(coords);
        if (piece.getColor() != color)
            if (piece instanceof Knight)
                return true;
        return false;
    }
}